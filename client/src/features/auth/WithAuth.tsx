import useAuth from "../../shared/hooks/useAuth";
import React from "react";
import {useNavigate} from "react-router-dom";

/**
 * Auth check HOC
 */
const withAuth = <P extends object>(WrappedComponent: React.ComponentType<P>) => {
  const WithAuth: React.FC<P> = (props) => {
    const token = useAuth();
    const navigate = useNavigate();

    React.useEffect(() => {
      if (!token) navigate('/');
    }, [token, navigate]);


    return <WrappedComponent {...props} />;
  };

  return WithAuth;
};

export default withAuth;