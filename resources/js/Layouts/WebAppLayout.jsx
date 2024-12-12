import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/react';
import {Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle} from "@/Components/ui/card.jsx";
import {Label} from "@/Components/ui/label.jsx";
import {Input} from "@/Components/ui/input.jsx";
import {Select, SelectContent, SelectItem, SelectTrigger, SelectValue} from "@/Components/ui/select.jsx";
import {Button} from "@/Components/ui/button.jsx";

export default function WebAppLayout({ children }) {
    return (
        <Card className="pt-6 m-2">
            <CardHeader>
                <CardTitle>Telegram Bots</CardTitle>
                <CardDescription>Here is our Telegram Bots</CardDescription>
            </CardHeader>
            <CardContent>
                {children}
            </CardContent>
        </Card>
        // <div className="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0 dark:bg-gray-900">
        //     <div>
        //         <Link href="/">
        //             <ApplicationLogo className="h-20 w-20 fill-current text-gray-500" />
        //         </Link>
        //     </div>
        //
        //     <div className="mt-6 w-11/12 h-full border rounded-md overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg dark:bg-gray-800">
        //         {children}
        //     </div>
        // </div>
    );
}
