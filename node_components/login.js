import React from 'react';
import { Redirect } from "react-router-dom";

class Login extends React.Component
{
    constructor(props)
    {
        super(props);
        this.state={
            redirect: null,
            email:null,
            password:null,
            login: false,
            jwt: null
        }
    }

    componentDidMount() { this.storeCollector() }
  
    storeCollector()
    {
        let store = JSON.parse(localStorage.getItem('login'));

        if (store && store.login)
        {
        this.setState({
            login: true,
            jwt: store.jwt
        });
        }
    }

    login()
    {
        fetch('http://localhost/intern_api/api/login.php', {
            method:"POST",
            body:JSON.stringify(this.state)
        }).then((response)=>{
            response.json().then((result)=>{
                console.warn("result", result);
                localStorage.setItem('login', JSON.stringify({
                    login:true,
                    token:result.jwt
                }))
                this.setState({
                    login:true,
                    redirect: "/"
                })
            })
        })
    }

    render()
    {
        if (this.state.redirect) 
        {
            return <Redirect to={this.state.redirect} />
        }
        return(
            <div>
                <div>
                    <input type="text" onChange={(event)=>{this.setState({email:event.target.value})}} />
                    <input type="password" onChange={(event)=>{this.setState({password:event.target.value})}} />
                    <button onClick={()=>{this.login()}}>Login</button>
                </div>
            </div>
        )
    }
}

export default Login;