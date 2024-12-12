import {Head, useForm} from '@inertiajs/react';
import React, {useEffect, useState} from "react";

import WebAppLayout from "@/Layouts/WebAppLayout.jsx";
import {Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle} from "@/Components/ui/card.jsx";
import {Button} from "@/Components/ui/button.jsx";
import {Badge} from "@/Components/ui/badge.jsx";
import {Skeleton} from "@/Components/ui/skeleton.jsx";
import { LazyLoadImage } from "react-lazy-load-image-component";
import 'react-lazy-load-image-component/src/effects/blur.css';

export default function Dashboard() {

    const [initDataUnsafe, setInitDataUnsafe] = useState(null);
    const [categories, setCategories] = useState([]);
    const [products, setProducts] = useState([]);
    const [selectedCategory, setSelectedCategory] = useState(null);
    const [loading, setLoading] = useState(false);

    const getProducts = (category_id) => {
        if (selectedCategory === category_id) {
            setSelectedCategory(null);
        }else {
            setSelectedCategory(category_id);
        }
        setLoading(true);
        axios.get(route('products.filter', {category_id: category_id}))
            .then(response => {
                setProducts(response.data.products);
                setCategories(response.data.categories);
                setLoading(false);

            })
            .catch(error => {
                console.error('There was an error fetching the products!', error);
            });
    }

    useEffect(() => {
// setInitDataUnsafe(window.Telegram.WebApp.initDataUnsafe);

        setLoading(true);
        getProducts()
    }, []);

    return (
        <WebAppLayout>
            <Head title="Products"/>

            <div className="mb-2">
                {loading ? (
                    Array.from({length: 3}).map((_, index) => (
                           <Skeleton key={index} className="h-6 w-24 m-1"/>
                    ))
                ) : (
                    categories.map((category, index) => (
                        <Badge key={index} className="text-md cursor-pointer m-1"
                               variant={selectedCategory === category.id ? 'default' : 'outline'}
                               onClick={() => getProducts(category.id)}
                        >{category.name}</Badge>
                    ))
                )}
            </div>
            <div className="">
                {loading ? (
                    Array.from({length: 3}).map((_, index) => (
                        <Card className="w-full mb-2" key={index}>
                            <div className="flex items-center rounded-sm border ">
                                <Skeleton className="h-[200px] w-full rounded-top"/>
                            </div>
                            <div className="flex flex-col space-y-3 mt-4 p-4">
                                <div className="space-y-2">
                                    <Skeleton className="h-4 w-[100px]"/>
                                    <Skeleton className="h-4 w-[200px]"/>
                                </div>
                            </div>
                            <CardFooter>
                                <Skeleton className="h-9 w-full"/>
                            </CardFooter>
                        </Card>
                    ))
                ) : (
                    products.map((product, index) => (
                        <Card className="w-full mb-2" key={index}>
                            <div className="flex items-center rounded-sm border ">
                                <LazyLoadImage src={`/storage/${product.image}`}
                                               className="rounded-t-sm"
                                               effect="blur"
                                />
                            </div>
                            <div className="flex flex-col space-y-3 mt-4 p-4">
                                <div className="space-y-2">
                                    <CardTitle>{product.name}</CardTitle>
                                    <CardDescription>{product.short_description}</CardDescription>
                                </div>
                            </div>
                            <CardFooter>
                                <Button className="w-full">
                                    Batafsil
                                </Button>
                            </CardFooter>
                        </Card>
                    ))
                )}
            </div>
        </WebAppLayout>
    );
}
