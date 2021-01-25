import React from "react";
import TitresH1 from "../UI/Titres/titreH1";


const error = (props) => {
return (
    <>
        <TitresH1 bgColor="bg-danger">Erreur {props.typeError}</TitresH1>
        <h3 className="text-center font-weight-bold">
            {props.children}
        </h3>
   </>
);
}

export default error;