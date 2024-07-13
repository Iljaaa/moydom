import {CadastreInformation} from "../types/CadastreInformation";


/**
 * Request code data
 */
export const Search = async (code:string, token: string, onSuccess: (data: CadastreInformation) => void, onFail: (error:string) => void) =>
{
  const fd = new FormData();
  fd.set('code', code)

  try {
    const response = await fetch(`api/search`, {
        method: 'post',
        headers: {
          'Accept': 'application/json',
          'Authorization': 'Bearer '+token
        },
        body: fd
    });

    if (response.status === 401) {
      throw new Error('Authorization expired')
    }

    const data = await response.json();

    // validation errors
    if (response.status == 422) {
      debugger
      const message = (data.message) ? data.message : `Server return false request`
      throw new Error(message)
    }

    // other errors
    if (!data.success) {
      debugger
      const message = (data.message) ? data.message : `Server return false request`
      throw new Error(message)
    }

    onSuccess(data.data)

    console.log(data, data)
  } catch (error) {
    if (error instanceof Error) {
      onFail(error.message);
    } else {
      onFail('An unknown error occurred');
    }
  }
};