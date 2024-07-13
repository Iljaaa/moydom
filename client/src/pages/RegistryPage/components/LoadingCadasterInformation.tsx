import {Card, Col, Placeholder} from "react-bootstrap";
import {CadastreInformation} from "../../../features/registry/types/CadastreInformation";
import React from "react";

export const LoadingCadasterInformation = () => {
  return <Col>
    <Card>
      <Card.Body>
        <Placeholder as={Card.Title} animation="glow">
          <Placeholder xs={6} />
        </Placeholder>
        <Placeholder as={Card.Text} animation="glow" style={{paddingLeft: "1rem"}}>
          <Placeholder xs={12} />
          <Placeholder xs={12} />
        </Placeholder>
        <Placeholder as={Card.Title} animation="glow">
          <Placeholder xs={6} />
        </Placeholder>
        <Placeholder as={Card.Text} animation="glow" style={{paddingLeft: "1rem"}}>
          <Placeholder xs={12} />
          <Placeholder xs={12} />
          <Placeholder xs={12} />
        </Placeholder>
        <Placeholder as={Card.Title} animation="glow">
          <Placeholder xs={6} />
        </Placeholder>
        <Placeholder as={Card.Text} animation="glow" style={{paddingLeft: "1rem"}}>
          <Placeholder xs={12} />
          <Placeholder xs={12} />
        </Placeholder>
      </Card.Body>
    </Card>
  </Col>
}

