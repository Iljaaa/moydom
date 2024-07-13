import React, {useState} from 'react';
import {Form, Button, Row} from 'react-bootstrap';
import {ValidateNumber} from "../validation/validateNumber";

type Props = {
  isLoading: boolean,
  onSubmit: (number:string) => void
}

const LoginForm: React.FC<Props> = (props:Props) =>
{
  const [number, setNumber] = useState<string>('');
  const [isValidate, setIsValidate] = useState<boolean>(false);

  const handleSubmit = async (e: React.FormEvent) =>
  {
    e.preventDefault();
    setIsValidate(true);
    if (!ValidateNumber(number, true).isValid) return
    props.onSubmit(number)
  };

  const validation = ValidateNumber(number, isValidate)

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
                          isInvalid={!validation.isValid}/>
            {validation.error !== "" && <Form.Control.Feedback type="invalid">{validation.error}</Form.Control.Feedback>}
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