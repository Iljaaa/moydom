import React from "react";
import {Alert, Col, Container, Row} from "react-bootstrap";
import LoginForm from "../../features/auth/components/LoginForm";
import {AuthCredentials} from "../../features/auth/types/AuthCredentials";
import {Auth} from "../../features/auth/services/Auth";

type Props = {
  // navigate:(url:string)=>void
}

type State = {
  isLoading: boolean
  error: string
}

export class LoginPage extends React.PureComponent<Props, State>
{
  public state:State = {
    error: "",
    isLoading: false
  }

  onSubmitData = (data:AuthCredentials) => {
    this.setState({isLoading: true, error: ''})
    Auth(data, this.onAuthSuccess, this.onAuthFail);
  }

  onAuthSuccess = () => {
    this.setState({isLoading: false})

    // @ts-ignore
    this.props.navigate('/registry');
  }

  onAuthFail = (error:string) => {
    this.setState({isLoading: false, error: error})
  }

  render() {
    return <Container>
      <Row className="justify-content-center mt-5">
        <Col xs={12} sm={8} md={6} lg={4}>
          <h1 className="text-center mb-4">Auth</h1>
          <LoginForm isLoading={this.state.isLoading}
                     onSubmit={this.onSubmitData} />

          {this.state.error && <Alert variant="danger" className="mt-2">{this.state.error}</Alert>}
        </Col>
      </Row>
    </Container>
  }
}