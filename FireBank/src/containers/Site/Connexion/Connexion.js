import React from "react";
import { render } from "react-dom";
import axios from "axios";

class Connexion extends React.Component {

    state = {
        login : "",
        password : ""
    }

    handleConnexion= (event) => {
        event.preventDefault();
        // this.setState({loading:true});
        const connexion = {
            login: this.state.login,
            password: this.state.password
        }
        axios.post("https://localhost/SERVEURBANKER/back/connexion.php",connexion)
        .then(reponse => {
                    console.log(reponse)
                    this.setState({loading:false});
                    this.handleReinitialisationConnexion();
                })
                .catch(error => {
                    console.log(error)
                    this.setState({loading:false});
                    this.handleReinitialisationConnexion();
                })
        

        // axios.post("http://localhost:80/SERVEURBANK%20-%20copie/back/login.php",{
        //     data: {
        //         login: this.state.login,
        //         password: this.state.password
        // }})

        console.log(connexion)

        // axios({
        //     method: 'post',
        //     url: 'http://localhost/SERVEURBANK%20-%20copie/back/login',
        //     data: connexion
        //   })

        //     .then(reponse => {
        //         console.log(reponse)
        //         // this.setState({loading:false});
        //         // this.handleReinitialisationConnexion();
        //     })
        //     .catch(error => {
        //         console.log(error)
        //         this.setState({loading:false});
        //         // this.handleReinitialisationConnexion();
        //     })
        
    }

    handleReinitialisationConnexion= () => {
        this.setState({
            login : "",
            password : ""
        })
    }

    onChange(e){
        this.setState({[e.target.name]:e.target.value});    
        // console.log(this.state) 
    }

    handleFormSubmit( event ) {
        event.preventDefault();
        console.log(this.state);
    }
    

    render(){
        return (
            <>
                <form method="POST" action="#" className="container mt-5" >
                    <div className="mb-3">
                        <label>Login</label>
                        <input type="text" name="login" onChange={e=>this.onChange(e)} value={this.state.login}/>
                    </div>
                    <div className="mb-3">
                        <label>Password</label>
                        <input type="text" name="password" onChange={e=>this.onChange(e)} value={this.state.password}/>
                        {/* <input type="password" name="password" onChange={event=>this.setState({password:event.target.value})}/> */}
                        
                    </div>
                    <input type="submit" value="submit" onClick={e => this.handleConnexion(e)}/>
                </form>
            </>
        );
    }
}

export default Connexion;