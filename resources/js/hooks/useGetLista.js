import React from 'react';
import {useMutation} from "react-query";
import {rutasService} from "../services";

function UseGetLista(props) {
    // const {mutate, isSuccess, data} = useMutation(
    //     rutasService.listarDatos, {
    //         onSuccess: (data) => {
    //             console.log(data)
    //
    //         },
    //         refetchOnWindowFocus: false,
    //         retry: 0,
    //     });

    const listarRep = async json => {
        console.log(json)
        // await mutate(json);
    };

    return {listarRep};
}

export default UseGetLista;
