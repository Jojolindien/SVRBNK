import React from "react";
import { render } from "react-dom";
import TitreH1 from "../../../components/UI/Titres/titreH1";
import axios from "axios";
import Client from "./client";

class clients extends React.Component {
    state = {
        clients : null,
        loading : false
    }

    loadingData =() => {
        this.setState({loading:true});
        axios.get(`https://bankcommentpegomas-default-rtdb.firebaseio.com/1.json`)
            .then(reponse=>{
                console.log(reponse)
                const clientsArray=Object.values(reponse.data)
                this.setState({
                    clients:clientsArray,
                    loading:false
                })
                console.log(this.state.clients)
            })
        .catch (error=>{
            console.log(error)
            this.setState({loading:false});
        })
    }

    componentDidMount = () => {
        this.loadingData();
    }

    render(){
        return (
            <>
                <TitreH1 bgColor="bg-info">Les clients</TitreH1>
                <div className="container">
                    <div className="row no gutters">
                        {
                            this.state.loading || this.state.clients==null ? 
                            <>
                                
                                <div className="spinner-border" role="status"> </div>
                                
                            </>
                            : this.state.clients.map(client=>{
                                return (
                                    <div className="col-12 col-md-6 col-xl-4" key={client.id}>
                                        <Client {...client}/>
                                    </div>
                                )
                            })
                        }
                    </div>
                </div>
            </>
        );
    }
}

export default clients;