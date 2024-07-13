import React from "react";
import {useNavigate} from "react-router-dom";

/**
 * Auth check HOC
 */
const withNavigate = <P extends object>(WrappedComponent: React.ComponentType<P>) => {
  const WithAuth: React.FC<P> = (props) => {
    const navigate = useNavigate();
    return <WrappedComponent {...props} navigate={navigate}  />;
  };

  return WithAuth;
};

export default withNavigate;