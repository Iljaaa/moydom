import {AuthCredentials} from "../types/AuthCredentials";
import {SetToken} from "../../../app/store/slices/SetToken";

/**
 * Auth user
 */
export const Auth = async (data:AuthCredentials, onAuthSuccess: () => void, onAuthFail: (error:string) => void) =>
{
  const fd = new FormData();
  fd.set('email', data.email)
  fd.set('password', data.password)

  try {
    const response = await fetch(`http://127.0.0.1:8080/api/auth`, {
        method: 'POST',
        headers: {
          // 'Content-Type': 'application/json',
          'Accept': 'application/json',
        },
        body: fd
    });

    if (!response.ok) {
      if (response.status === 400) {
        const data = await response.json();
        if (data.error) throw new Error(data.error)
      }
      else {
        throw new Error(`Error ${response.status}: ${response.statusText}`)
      }
    }

    // save token into store
    const data = await response.json();
    if (data.token) {
      await SetToken(data.token);
    }

    onAuthSuccess();
  }
  catch (error)
  {
    if (error instanceof Error) {
      onAuthFail(error.message);
    } else {
      onAuthFail('An unknown error occurred');
    }
  }
};