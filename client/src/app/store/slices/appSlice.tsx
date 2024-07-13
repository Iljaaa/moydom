import { createSlice, PayloadAction } from '@reduxjs/toolkit';

interface AppState {
    userToken: string
}

const initialState: AppState = {
    userToken: ''
};

const userSlice = createSlice({
    name: 'user',
    initialState,
    reducers: {
        setToken: (state, action: PayloadAction<string>) => {
            state.userToken = action.payload
        },
    },
});

export const {
    setToken
} = userSlice.actions;

export default userSlice.reducer;