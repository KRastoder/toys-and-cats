import { useState } from 'react';
import { Form, Head } from '@inertiajs/react';
import InputError from '@/components/input-error';
import PasswordInput from '@/components/password-input';
import TextLink from '@/components/text-link';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import { Spinner } from '@/components/ui/spinner';
import { login } from '@/routes';
import { store } from '@/routes/register';

export default function Register() {
    const [role, setRole] = useState<'user' | 'doctor'>('user');

    return (
        <>
            <Head title="Register" />

            <Form
                {...store.form()}
                resetOnSuccess={['password', 'password_confirmation']}
                disableWhileProcessing
                className="flex flex-col gap-6"
            >
                {({ processing, errors }) => (
                    <>
                        <div className="grid gap-6">
                            {/* NAME */}
                            <div className="grid gap-2">
                                <Label htmlFor="name">Name</Label>
                                <Input
                                    id="name"
                                    name="name"
                                    type="text"
                                    required
                                />
                                <InputError message={errors.name} />
                            </div>

                            {/* EMAIL */}
                            <div className="grid gap-2">
                                <Label htmlFor="email">Email</Label>
                                <Input
                                    id="email"
                                    name="email"
                                    type="email"
                                    required
                                />
                                <InputError message={errors.email} />
                            </div>

                            {/* PASSWORD */}
                            <div className="grid gap-2">
                                <Label htmlFor="password">Password</Label>
                                <PasswordInput
                                    id="password"
                                    name="password"
                                    required
                                />
                                <InputError message={errors.password} />
                            </div>

                            {/* CONFIRM PASSWORD */}
                            <div className="grid gap-2">
                                <Label htmlFor="password_confirmation">
                                    Confirm password
                                </Label>
                                <PasswordInput
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    required
                                />
                                <InputError
                                    message={errors.password_confirmation}
                                />
                            </div>

                            {/* ROLE */}
                            <div className="grid gap-2">
                                <Label htmlFor="role">Register as</Label>

                                <select
                                    id="role"
                                    name="role"
                                    required
                                    value={role}
                                    onChange={(e) =>
                                        setRole(
                                            e.target.value as 'user' | 'doctor',
                                        )
                                    }
                                >
                                    <option value="user">User</option>
                                    <option value="doctor">Doctor</option>
                                </select>

                                <InputError message={errors.role} />
                            </div>

                            {/* DOCTOR FIELDS */}
                            {role === 'doctor' && (
                                <>
                                    <div className="grid gap-2">
                                        <Label>Years of experience</Label>
                                        <Input
                                            name="years_of_experience"
                                            type="number"
                                            min={0}
                                            required
                                        />
                                    </div>

                                    <div className="grid gap-2">
                                        <Label>Speciality</Label>
                                        <Input
                                            name="speciality"
                                            type="text"
                                            required
                                        />
                                    </div>
                                </>
                            )}

                            {/* SUBMIT */}
                            <Button type="submit" className="w-full">
                                {processing && <Spinner />}
                                Create account
                            </Button>
                        </div>

                        <div className="text-center text-sm">
                            Already have an account?{' '}
                            <TextLink href={login()}>Log in</TextLink>
                        </div>
                    </>
                )}
            </Form>
        </>
    );
}

Register.layout = {
    title: 'Create an account',
    description: 'Enter your details below to create your account',
};
