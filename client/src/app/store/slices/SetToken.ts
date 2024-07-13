import store from "../../../app/store/store"
import {setToken} from "./appSlice"

/**
 * @constructor
 * @param token
 */
export const SetToken = (token:string) => store.dispatch(setToken(token))