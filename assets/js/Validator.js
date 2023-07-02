function Validator(options) {

    //     //Chặn không cho mở consolelog
    // document.addEventListener("keydown", function (event){
    //     if (event.ctrlKey){
    //        event.preventDefault();
    //     }
    //     if(event.keyCode == 123){
    //        event.preventDefault();
    //     }
    // });

    function checkRadio(element, selector) {
        var radioCheck = document.querySelectorAll('input[name="gender"]');
        console.log(radioCheck.values);
    }

    //sử dụng để xác định các 
    function getParent(element, selector) {
        while (element.parentElement) { //Lặp để tìm qua theo từng element tìm thẻ input
            if (element.parentElement.matches(selector)) {
                return element.parentElement;
            }
            element = element.parentElement; //Tìm ra thẻ input sẽ gán element = element.parentElement
        }
    }

    //Hàm lưu rule
    var selectorRules = {}
    //Hàm thực hiện
    function Validate(inputElement, rule) {
        //value :inputElement.value
        //test function: rule.test
        // console.log(inputElement.parentElement.querySelector('.form-message'));//Get message trong lớp cha
        var errorMessage;
        var errorElelements = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
        //Lấy ra các rule của selector
        var rules = selectorRules[rule.selector];

        //Lặp qua từng rule và kiểm tra nếu có lỗi thì dừng
        for (var i = 0; i < rules.length; ++i) {
            switch (inputElement.typeof) {
                case 'radio':
                case 'checkbox':
                    errorMessage = rules[i](
                        formElement.querySelector(rule.selector + ':checked'),
                    );
                    break;
                default:
                    errorMessage = rules[i](inputElement.value);
            }
            if (errorMessage) break;
        }
        if (errorMessage) {
            errorElelements.innerHTML = errorMessage;
            getParent(inputElement, options.formGroupSelector).classList.add('invalid');
        } else {
            errorElelements.innerHTML = '';
            getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
        }
        return !errorMessage;
    }
    //Lấy Element của form cần validate
    var formElement = document.querySelector(options.form);
    // console.log(options.rules);
    if (formElement) {

        //Khi ấn xác nhận
        formElement.onsubmit = function (e) {
            e.preventDefault();

            var isValid = true;
            console.log(isValid);
            //Thực hiện qua từng rule và validate
            options.rules.forEach(function (rule) {
                var inputElement = formElement.querySelector(rule.selector);
                var valid = Validate(inputElement, rule);
                if (!valid) {
                    isValid = false;
                    console.log(isValid);
                }
            });

            if (isValid) {
                //Trường hợp submit với javascript
                if (typeof options.onSubmit === 'function') {
                    var formEnableInput = formElement.querySelectorAll('[name]:not([disabled])');
                    var formValues = Array.from(formEnableInput).reduce(function (values, input) {
                        values[input.name] = input.value;
                        return values;
                    }, {});
                    options.onSubmit(formValues);
                    alert('Đã lấy dữ liệu');
                }
                //Trường hợp submit mặc định
            } else {
                // formElement.submit();
                alert('Submit mặc định');
            }
        }

        //Xử lý lặp qua mỗi rules
        options.rules.forEach(function (rule) {
            //Lưu lại các rule
            if (Array.isArray(selectorRules[rule.selector])) {
                selectorRules[rule.selector].push(rule.test);
            } else {
                selectorRules[rule.selector] = [rule.test];
            }

            var inputElement = formElement.querySelectorAll(rule.selector);
            Array.from(inputElement).forEach(function (inputElement) {
                if (inputElement) {
                    //Xử lý trường hợp blur khỏi input
                    inputElement.onblur = function () {
                        Validate(inputElement, rule);
                    }
                    //Xử lý trường hợp sau khi nhập sai
                    inputElement.oninput = function () {
                        var errorElelements = getParent(inputElement, options.formGroupSelector).querySelector(options.errorSelector);
                        errorElelements.innerHTML = '';
                        getParent(inputElement, options.formGroupSelector).classList.remove('invalid');
                    }
                }
            });
        });
    }
}
//Định nghĩa điều luật
//Nguyên tắc 
//1. Khi có lỗi thì trả ra message lỗi
//2. Khi hợp lệ ko trả ra j cả (undefined)
Validator.isRequired = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : message || 'Vui lòng nhập trường này!!!';
        }
    };
}
Validator.isEmail = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return regex.test(value) ? undefined : message || 'Vui lòng nhập đúng định dạng!!!';
        }
    };
}
Validator.isCheck = function (selector, getCofirmValue, message) {
    return {
        selector: selector,
        test: function (value) {
            return value === getCofirmValue() ? undefined : message || 'Giá trị nhập vào không chính xác';
        }
    }
}
Validator.isSDT = function (selector, getCofirmValue, message) {
    return {
        selector: selector,
        test: function (value) {
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            return vnf_regex.test(value) ? undefined : message || 'Vui lòng nhập đúng định dạng';
        }
    }
}