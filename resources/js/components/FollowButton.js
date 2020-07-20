import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';

function FollowButton(props) {
    const [follows, setFollows] = useState(props.follows);

    const FollowUser = () => {
        axios.post('/follow/'+ props.userid)
            .then(response => {
                alert('Followed!');
                setFollows(!follows);
            })
            .catch(errors => {
                if (errors.response.status == 401 ) {
                    window.location = '/login';
                }
            }
        );
        return;
    }

    return (
        <button onClick={FollowUser} className="btn btn-primary">{follows ? 'Unfollow' : 'Follow'}</button>
    );
}

export default FollowButton;

if (document.getElementById('follow-button-container')) {
    let element = document.getElementById('follow-button-container');

    let props = Object.assign({}, element.dataset)

    ReactDOM.render(<FollowButton {...props} />, element);
}

if (document.getElementsByClassName('follow-button-container')) {
    let elements = [...document.getElementsByClassName('follow-button-container')];
    console.log(elements)
    elements.map(element => {
        let props = Object.assign({}, element.dataset)
        ReactDOM.render(<FollowButton {...props} />, element);
    })
}
