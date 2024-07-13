import { useSelector } from 'react-redux';
import { RootState } from '../../../app/store/store'; // Импортируем тип RootState из store

const useAuth = (): string | null => {
  return useSelector((state: RootState) => state.app.userToken);
};

export default useAuth;