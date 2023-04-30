import {render} from 'preact';
import {App} from './app.jsx';
import './index.css';

render(
    <div class="container">
        <h1>Docker na prática</h1>
        <App/>
    </div>,
    document.getElementById('app')
);
