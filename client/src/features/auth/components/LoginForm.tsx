import React, {useMemo, useState} from 'react';
import { Form, Button } from 'react-bootstrap';
import {ValidateAuthCredentials} from "../validation/ValidateAuthCredentials";
import {AuthCredentials} from "../types/AuthCredentials";

type Props = {
  isLoading: boolean,
  onSubmit: (data:AuthCredentials) => void
}

const LoginForm: React.FC<Props> = (props:Props) =>
{
  const [formState, setFormState] = useState<AuthCredentials>({ email: 'test@example.com', password: 'secret' });
  const [isValidate, setIsValidate] = useState<boolean>(false);

  const onEmailChange = (newEmail:string) => {
    setFormState({...formState, email: newEmail});
  }

  const onPasswordChange = (newPassword:string) => {
    setFormState({...formState, password: newPassword});
  }

  const handleSubmit = async (e: React.FormEvent) =>
  {
    e.preventDefault();
    setIsValidate(true)

    const validationResult = ValidateAuthCredentials(formState, true)
    if (validationResult.isValid) {
      props.onSubmit(formState)
    }
  };

  const validationResult = useMemo(() => ValidateAuthCredentials(formState, isValidate), [isValidate, formState.email, formState.password])

  return <Form onSubmit={handleSubmit}>
    <Form.Group controlId="formBasicEmail">
      <Form.Label>Email address</Form.Label>
      <Form.Control type="text"
                    placeholder="Enter email"
                    name="email"
                    value={formState.email}
                    disabled={props.isLoading}
                    onChange={(event: React.ChangeEvent<HTMLInputElement>) => onEmailChange(event.target.value)}
                    isInvalid={validationResult.errors.email !== ''}/>
      <Form.Control.Feedback type="invalid">{validationResult.errors.email}</Form.Control.Feedback>
    </Form.Group>
    <Form.Group controlId="formBasicPassword" className="mt-2">
      <Form.Label>Password</Form.Label>
      <Form.Control type="password"
                    placeholder="Password"
                    name="password"
                    value={formState.password}
                    disabled={props.isLoading}
                    onChange={(event: React.ChangeEvent<HTMLInputElement>) => onPasswordChange(event.target.value)}
                    isInvalid={validationResult.errors.password !== ''}/>
      <Form.Control.Feedback type="invalid">{validationResult.errors.password}</Form.Control.Feedback>
    </Form.Group>
    <div className="mt-2">
      <Button variant="primary" type="submit" disabled={props.isLoading}>
        {props.isLoading ? 'Loading...' : 'Submit'}
      </Button>
    </div>
  </Form>;
};

export default LoginForm;