


type ValidateOneField = {
  isValid: boolean
  error:string
}

/**
 * Validate data from auth form
 * @param number
 * @param validateEmptyFields
 * @constructor
 */
export const ValidateNumber = (number:string, validateEmptyFields: boolean):ValidateOneField =>
{
  number.trim()
  if (validateEmptyFields && !number) {
    return {isValid: false, error: 'Number is required'}
  }

  const regex = /^[0-9]{2}:[0-9]{2}:[0-9]{5,7}:[0-9]{2,4}$/i;
  if (validateEmptyFields && !regex.test(number) ){
    return {isValid: false, error: 'Number has wrong format'}
  }

  return {isValid: true, error: ''}
}
