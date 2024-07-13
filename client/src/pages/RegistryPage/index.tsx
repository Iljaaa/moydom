import {Alert, Col, Container, Row} from "react-bootstrap";
import React from "react";
import CadasterNumberForm from "../../features/registry/components/CadasterNumberForm";
import {Search} from "../../features/registry/services/Search";
import {CadastreInformation} from "../../features/registry/types/CadastreInformation";
import {CadasterInformation} from "./components/CadasterInformation";
import {LoadingCadasterInformation} from "./components/LoadingCadasterInformation";

type Props = {
  token?: string
}

type State = {
  isLoading: boolean
  error: string,
  information?: CadastreInformation
}

export class RegistryPage extends React.PureComponent<Props, State>
{

  public state:State = {
    isLoading: false,
    error: ""
  }

  onNumberSubmit = (number:string) =>
  {
    if (!this.props.token) return;
    this.setState({isLoading: true, error: ''})
    Search(number, this.props.token, this.onSuccess, this.onFail)
  }

  onSuccess = (data:CadastreInformation) => {
    console.log(data, 'data')
    this.setState({isLoading: false, information: data})
  }

  onFail = (error:string) => {
    this.setState({isLoading: false, error: error})
  }

  render (){
    return <Container>
      <Row className="justify-content-center mt-5">
        <Col xs={12} sm={8} md={6} lg={4}>
          <h1 className="text-center mb-4">Запрос информации по кадастровому номеру</h1>
          <CadasterNumberForm isLoading={this.state.isLoading} onSubmit={this.onNumberSubmit} />
          {this.state.error && <Alert variant="danger" className="mt-2">{this.state.error}</Alert>}
        </Col>
      </Row>
      {this.state.error === '' && <CadasterBlock isLoading={this.state.isLoading}
                                                 information={this.state.information} />}

    </Container>
  }
}

type CadasterBlockProps = {
  isLoading: boolean
  information?: CadastreInformation
}

const CadasterBlock = (props:CadasterBlockProps) => <Row className="justify-content-center mt-2">
    <Col sm={12} md={8}>
      {props.isLoading && <LoadingCadasterInformation />}
      {(props.information && !props.isLoading) && <CadasterInformation item={props.information} />}
    </Col>
  </Row>