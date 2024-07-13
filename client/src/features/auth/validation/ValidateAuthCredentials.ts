import {AuthCredentials} from "../types/AuthCredentials";

type ValidationResult = {
  isValid: boolean
  errors: AuthCredentials
}

type ValidateOneField = {
  isValid: boolean
  error:string
}

/**
 * Validate data from auth form
 * @param data
 * @param validateEmptyFields
 * @constructor
 */
export const ValidateAuthCredentials = (data:AuthCredentials, validateEmptyFields: boolean):ValidationResult =>
{
  const email = ValidateEmail(data.email, validateEmptyFields)
  const password = ValidatePassword(data.password, validateEmptyFields)
  return {
    isValid: (email.isValid && password.isValid),
    errors: {
      email: email.error,
      password: password.error
    }
  }
}

const ValidateEmail= (value:string, validateEmptyFields: boolean):ValidateOneField =>
{
  value.trim()
  if (validateEmptyFields && !value) {
    return {isValid: false, error: 'Email is required'}
  }

  return {isValid: true, error: ''}
}

const ValidatePassword = (value:string, validateEmptyFields: boolean):ValidateOneField =>
{
  value.trim()
  if (validateEmptyFields && !value) {
    return {isValid: false, error: 'Password is required'}
  }

  return {isValid: true, error: ''}
}