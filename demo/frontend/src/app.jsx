import {useEffect, useState} from 'preact/hooks';
import axios from 'axios';

axios.defaults.baseURL = import.meta.env.VITE_API_URL;

export function App() {
    const [error, setError] = useState(null);
    const [data, setData] = useState(null);

    useEffect(() => {
        axios.get('/users').then((response) => {
            if (response.data?.data) {
                setData(response.data.data);
                return;
            }
            console.error(response);
            setError(response.data.error || 'Um erro desconhecido ocorreu');
        }).catch((err) => {
            console.error(err);
            setError(err.message || 'Um erro desconhecido ocorreu');
        });
    }, []);

    if (error !== null) {
        return (
            <div>Erro: {error}</div>
        );
    }

    if (data === null) {
        return (
            <div>Carregando...</div>
        );
    }

    return (
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="2">
                        {data.length} registro{(data.length) ? 's' : ''}
                    </td>
                </tr>
            </tfoot>
            <tbody>
                {data.map((row) => (
                    <tr>
                        <td>{row.id}</td>
                        <td>{row.name}</td>
                    </tr>
                ))}
            </tbody>
        </table>
    );
}
