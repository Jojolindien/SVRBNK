import axios from 'axios';
const SERVER_URL = "http://127.0.0.1:8000";

const login = async (data) => {
    const LOGIN_ENDPOINT = `${SERVER_URL}/api/login.php`;

    try {

        let response = await axios.post(LOGIN_ENDPOINT, data);

        if(response.status === 200 && response.data.jwt && response.data.expireAt){
            let jwt = response.data.jwt;
            let expire_at = response.data.expireAt;

            localStorage.setItem("access_token", jwt);
            localStorage.setItem("expire_at", expire_at);

        }


    } catch(e){
        console.log(e);
    }
}
