import React from 'react';

export const listarDatos = async filtros => {

    const response = await axios.get(
        `showRadiacion?codigo=${filtros.codigo}&fecha1=${filtros.fecha1}&fecha2=${filtros.fecha2}`
    );
    return response.data;
};

export const listarEstaciones = async () => {

    const response = await axios.get(
        `listaEstaciones`
    );
    return response.data;
};
