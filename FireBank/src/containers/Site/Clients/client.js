import React from "react";
import { render } from "react-dom";

class client extends React.Component {

    state = {

    }

    render(){
        return (
            <>
            
            <div className="card mb-3">
                <h3 className="card-header">{this.props.name} - {this.props.firstName}</h3>
    
                <div className="card-body">
                {/* {this.props.compte.MrouMme} */}
                </div>
                
            </div>
            </>
        );
    }
}

export default client;