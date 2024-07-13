import {Card, Col} from "react-bootstrap";
import {CadastreInformation} from "../../../features/registry/types/CadastreInformation";
import React from "react";

type Props = {
  item?: CadastreInformation
}

export const CadasterInformation = (props:Props) => {
  return <Col>
    <Card>
      <Card.Body>
        <Card.Title>Общая информация</Card.Title>
        <Card.Text style={{paddingLeft: "1rem"}}>
          <div>Кадастровый номер {props.item?.cadastre_number}</div>
          <div>Дата присвоения кадастрового номера {props.item?.cadastre_number_date}</div>
        </Card.Text>
        <Card.Title>Характеристики объекта</Card.Title>
        <Card.Text style={{paddingLeft: "1rem"}}>
          <div>Адрес (местоположение) {props.item?.address}</div>
          <div>Площадь, {props.item && props.item.area + " кв.м"}</div>
          <div>Этаж {props.item?.flore}</div>
        </Card.Text>
        <Card.Title>Сведения о кадастровой стоимости</Card.Title>
        <Card.Text style={{paddingLeft: "1rem"}}>
          <div>Кадастровая стоимость (руб) {(props.item) && props.item.cadastre_value + " руб" }</div>
          <div>Дата определения {props.item?.cadastre_value_date}</div>
        </Card.Text>
      </Card.Body>
    </Card>
  </Col>
}

