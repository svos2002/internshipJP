import React from 'react';
import Card from './card.js';

class Home extends React.Component
{
    constructor()
    {
        super();
        this.state={
            find:null,
            data:null,
            isLoaded:false
        }
    }

    componentDidMount()
    {
        fetch('http://localhost/intern_api/api/search.php', {
            method:"POST"
        }).then((response)=>{
            response.json().then((result)=>{
                console.warn("result", result);
                this.setState({
                    data: result,
                    isLoaded: true
                })
            })
        })
    }

    render()
    {
        if (!this.state.isLoaded) 
        {
            return <div>loading...</div>

        }
        else 
        { 
            return (
                <div>
                {this.state.data.data.map((item) => (
                    <Card key={item.id} name={item.name} email={item.email} gender={item.gender} phone={item.phone_number} country={item.country} age={item.age} />  
                ))}
            </div>
            )
        }
    }
}

export default Home;