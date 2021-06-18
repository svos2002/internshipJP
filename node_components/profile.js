import React from 'react';
import { Redirect } from "react-router-dom";

class Profile extends React.Component
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
            country: null,
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
            jwt: store.token
        });
        }
    }

    update()
    {
        fetch('http://localhost/intern_api/api/update.php', {
            method:"POST",
            body:JSON.stringify(this.state)
        }).then((response)=>{
            response.json().then((result)=>{
                console.warn("result", result);
                this.setState({
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
                    <input placeholder="full name" type="text" onChange={(event)=>{this.setState({name:event.target.value})}} />
                    <input placeholder="gender" type="text" onChange={(event)=>{this.setState({gender:event.target.value})}} />
                    <input placeholder="phone" type="text" onChange={(event)=>{this.setState({phone_number:event.target.value})}} />
                    <input placeholder="country" type="text" onChange={(event)=>{this.setState({country:event.target.value})}} />
                    <input placeholder="age" type="number" onChange={(event)=>{this.setState({age:event.target.value})}} />
                    <button onClick={()=>{this.update()}}>Update</button>
                </div>
            </div>
        )
    }
}

export default Profile;