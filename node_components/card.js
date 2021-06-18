import React from 'react';

class Card extends React.Component
{
    constructor(props)
    {
        super(props);
        this.state={
            style:{

                text: { 
                    float: "left",
                    marginLeft: "5px"
                },
                box:{
                    float: "left",
                    width: "300px",
                    height: "470px",
                    marginLeft: "100px",
                    marginBottom: "10px",
                    border: "1px solid black",
                    borderRadius: "25px 25px 25px 25px"
                }
            }
        }
    }

    render()
    {
        return(
            <div style={this.state.style.box}>
                <div style={{boxSizing: "border-box", padding: '10px'}}>
                    <div>
                        <h2>
                            <b>Name:</b>
                        </h2>
                        <h2>{this.props.name}</h2>
                    </div>
                    <hr/>
                    <div style={{
                        float: "left",
                        width: "50%"
                        }}>
                        <p>
                            <b>gender:</b>
                        </p>
                        <p>{this.props.gender}</p>
                    </div>
                    <div style={{float: "left"}}>
                        <p>
                            <b>age:</b>
                        </p>
                        <p>{this.props.age}</p>
                    </div>
                    <div style={{clear: "both"}}>
                        <p>
                            <b>country:</b>
                        </p>
                        <p>{this.props.country}</p>
                    </div>
                    <hr/>
                    <div style={{
                        float: "left",
                        width: "50%"
                        }}>
                        <p>
                            <b>phone:</b>
                        </p>
                        <p>{this.props.phone}</p>
                    </div>
                    <div style={{float: "left"}}>
                        <p>
                            <b>email:</b>
                        </p>
                        <p>{this.props.email}</p>
                    </div>
                </div>
            </div>
        )
    }
}

export default Card;