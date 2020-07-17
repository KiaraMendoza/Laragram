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
        <button onClick={FollowUser} class="btn btn-primary">{follows ? 'Unfollow' : 'Follow'}</button>
    );
}

export default FollowButton;

if (document.getElementById('follow-button-container')) {
    const element = document.getElementById('follow-button-container');

    const props = Object.assign({}, element.dataset)

    ReactDOM.render(<FollowButton {...props} />, element);
}

// if (document.getElementsByClassName('follow-button-container')) {
//     const element = document.getElementsByClassName('follow-button-container');

//     const props = Object.assign({}, element.dataset)

//     ReactDOM.render(<FollowButton {...props} />, element);
// }
