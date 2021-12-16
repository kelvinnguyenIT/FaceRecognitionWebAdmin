import React, { Component } from "react";
import ReactDOM from "react-dom";

class Example extends React.Component {
    render() {
        return <div></div>;
    }
}

export default Example;

if (document.getElementById("example")) {
    ReactDOM.render(<Example />, document.getElementById("example"));
}
