import { Head, usePage } from '@inertiajs/react';
import type { Auth } from '@/types';

export default function HomePage() {
    const { auth } = usePage<{ auth: Auth }>().props;

    return (
        <div>
            <Head title="Home" />
            <h1>Hello inertia</h1>
            <p>User : {auth.user.name}</p>
            <p>Role : {auth.user.role}</p>
        </div>
    );
}
