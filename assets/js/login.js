function Validator(options) {
   //if input isn't same level tag
   function getParent(element, selector) {
      while (element.parentElement) {
         if (element.parentElement.matches(selector)) {
            return element.parentElement;
         }
         element = element.parentElement;
      }
   }

   let selectorRules = {};

   function valiadate(inputElement, rule) {
      let parentElement = getParent(inputElement, options.formGroupSelector);
      let errorElement = parentElement.querySelector(options.errorSelector);
      let errorMessage;
      let rulesInput = selectorRules[rule.selector];

      for (let ruleInput of rulesInput) {
         switch (inputElement.type) {
            case 'checkbox': case 'radio':
               errorMessage = ruleInput(
                  formElement.querySelector(rule.selector + ':checked')
               )
               break;

            default:
               errorMessage = ruleInput(inputElement.value)
         }

         if (errorMessage) break;
      }

      if (errorMessage) {
         errorElement.innerHTML = `<i class="fas fa-exclamation-circle"></i>${errorMessage}`;
         inputElement.classList.add("invalid");
      }
      else {
         errorElement.innerHTML = '';
         inputElement.classList.remove("invalid");
      }

      return !errorMessage;
   }


   //Get form element
   let formElement = document.querySelector(options.form);

   if (formElement) {
      //Submit form
      formElement.onsubmit = (e) => {
         e.preventDefault();

         let isFormValid = true;

         options.rules.forEach(rule => {
            let inputElement = formElement.querySelector(rule.selector)

            let isValid = valiadate(inputElement, rule)
            if (!isValid) {
               isFormValid = false;
            }
         });

         if (isFormValid) {
            //JS Submit
            if (typeof options.onSubmit === 'function') {
               let enableInputs = formElement.querySelectorAll('[name]')
               let formValues = Array.from(enableInputs).reduce(
                  (values, input) => {
                     switch (input.type) {
                        case 'radio':
                           values[input.name] = formElement.querySelector(`input[name="${input.name}"]:checked`).value;
                           break;
                        case 'checkbox':
                           if (!input.matches(':checked')) {
values[input.name] = [];
                              return values;
                           }
                           if (!Array.isArray(values[input.name])) {
                              values[input.name] = [];
                           }
                           values[input.name].push(input.value)
                           break;
                        case 'file':
                           values[input.name] = input.files;
                        default:
                           values[input.name] = input.value;
                     }


                     return values;
                  }, {});

               options.onSubmit(formValues)
            }
            //Default Submit
            else {
               formElement.submit();
            }
         }
      }

      //Get rule for handle
      options.rules.forEach(rule => {
         //Save rules to input
         if (Array.isArray(selectorRules[rule.selector])) {
            selectorRules[rule.selector].push(rule.test);
         }
         else {
            selectorRules[rule.selector] = [rule.test];
         }

         let inputElements = formElement.querySelectorAll(rule.selector)

         for (let inputElement of inputElements) {
            if (inputElement) {
               // Handle Blur
               inputElement.onblur = () => {
                  valiadate(inputElement, rule);
               };

               //Handle Input
               inputElement.oninput = () => {
                  let parentElement = getParent(inputElement, options.formGroupSelector);
                  let errorElement = parentElement.querySelector(options.errorSelector);

                  errorElement.innerHTML = '';
                  inputElement.classList.remove("invalid");
               };

               //Handle change
               inputElement.onchange = () => {
                  valiadate(inputElement, rule);
               }
            }
         }
      });
   }
}


Validator.isRequired = (myNode, message) => {
   return {
      selector: myNode,
      test: function (value) {
         if (!value)
            value = '';
         return value ? undefined : message || 'Vui lòng nhập trường này'
      }
   };
}

Validator.isEmail = (myNode, message) => {
   return {
      selector: myNode,
      test: function (value) {
         let regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/

         return regex.test(value) ? undefined : message || 'Vui lòng nhập lại email';
      }
   };
}

Validator.minLength = (myNode, min, message) => {
   return {
      selector: myNode,
      test: function (value) {
         return value.length < min ? message || `Vui lòng nhập tối thiểu ${min} kí tự` : undefined;
      }
   };
}

Validator.isDuplicated = (myNode, getConfirmValue, message) => {
   return {
      selector: myNode,
      test: function (value) {
return value === getConfirmValue() ? undefined : message || 'Giá trị nhập vào không chính xác'
      }
   };
}

Validator.isCorrectPhone = (myNode, message) => {
   return {
      selector: myNode,
      test: function (value) {
         let regex = /0\d{9}$/gm;
         return regex.test(value) ? undefined : message || 'Số điện thoại không hợp lệ'
      }
   };
}