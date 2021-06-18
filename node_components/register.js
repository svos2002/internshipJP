import React from 'react';
import { Redirect } from "react-router-dom";

class Register extends React.Component
{
    constructor(props)
    {
        super(props);
        this.state={
            redirect:null,
            name:null,
            password:null,
            email:null,
            gender:null,
            phone_number:null,
            age: null,
            country: null
        }
    }

    register()
    {
        console.log(this.state)
        fetch('http://localhost/intern_api/api/register.php', {
            method:"POST",
            body:JSON.stringify(this.state)
        }).then((response)=>{
            response.json().then((result)=>{
                console.log(result);
                this.setState({Redirect: "/login"});
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
                    <input placeholder="full name" type="text" onChange={(event)=>{this.setState({name:event.target.value})}} />
                    <input placeholder="password" type="text" onChange={(event)=>{this.setState({password:event.target.value})}} />
                    <input placeholder="email" type="email" onChange={(event)=>{this.setState({email:event.target.value})}} />
                    <input placeholder="gender" type="text" onChange={(event)=>{this.setState({gender:event.target.value})}} />
                    <input placeholder="phone" type="text" onChange={(event)=>{this.setState({phone_number:event.target.value})}} />
                    <input placeholder="country" type="text" onChange={(event)=>{this.setState({country:event.target.value})}} />
                    <input placeholder="age" type="number" onChange={(event)=>{this.setState({age:event.target.value})}} />
                    <button onClick={()=>{this.register()}}>Register</button>
                </div>
            </div>
        )
    }
}

export default Register;