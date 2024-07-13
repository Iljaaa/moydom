import React, {useState} from 'react';
import {Form, Button, Row} from 'react-bootstrap';

type Props = {
  isLoading: boolean,
  onSubmit: (number:string) => void
}

const LoginForm: React.FC<Props> = (props:Props) =>
{
  const [number, setNumber] = useState<string>('');

  const handleSubmit = async (e: React.FormEvent) =>
  {
    e.preventDefault();

    // const validationResult = ValidateAuthCredentials(formState, true)
    // if (validationResult.isValid) {
    //   props.onSubmit(formState)
    // }
    props.onSubmit(number)
  };

  // const validationResult = useMemo(() => ValidateAuthCredentials(formState, isValidate), [isValidate, formState.email, formState.password])
//
//   const regex = /^\d{2}:\d{2}:\d{5,7}:\d{2}$/;
//
//   console.log(regex.test("12:34:12345:67")); // true

  return <Form onSubmit={handleSubmit}>
    <Row>
      <div>
        <div>
          <Form.Group controlId="formBasicEmail">
            <Form.Label>Укажите номер в формате XX:XX:XXXXX:XX</Form.Label>
            <Form.Control type="text"
                          placeholder="XX:XX:XXXXX:XX"
                          name="email"
                          value={number}
                          disabled={props.isLoading}
                          onChange={(event: React.ChangeEvent<HTMLInputElement>) => setNumber(event.target.value)}
                          isInvalid={false}/>
            <Form.Control.Feedback type="invalid">asdasd</Form.Control.Feedback>
          </Form.Group>
        </div>
      </div>
    </Row>


    <div className="mt-2">
      <Button variant="primary" type="submit" disabled={props.isLoading}>
        {props.isLoading ? 'Загрузка...' : 'Отправить'}
      </Button>
    </div>
  </Form>;
};

export default LoginForm;