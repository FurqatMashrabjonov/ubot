import {Head, useForm} from '@inertiajs/react';
import React, {useEffect, useState} from "react";

import WebAppLayout from "@/Layouts/WebAppLayout.jsx";
import {Card, CardContent, CardFooter, CardHeader, CardTitle} from "@/Components/ui/card.jsx";
import {Button} from "@/Components/ui/button.jsx";
import {Badge} from "@/Components/ui/badge.jsx";
import {Skeleton} from "@/Components/ui/skeleton.jsx";

export default function Dashboard() {

    const [initDataUnsafe, setInitDataUnsafe] = useState(null);
    const [categories, setCategories] = useState([]);
    const [products, setProducts] = useState([]);
    const [selectedCategory, setSelectedCategory] = useState(null);
    const [loading, setLoading] = useState(false);
    const [loadingEachPicture, setLoadingEachPicture] = useState([]);
    useEffect(() => {
// setInitDataUnsafe(window.Telegram.WebApp.initDataUnsafe);
    }, [setInitDataUnsafe]);

    const getProducts = () => {
        axios.get(route('products.filter'))
            .then(response => {
                setProducts(response.data.products);
                setCategories(response.data.categories);
                setSelectedCategory(response.data.selectedCategory);
                setLoading(false);

                let loadingEachPicture = [];
                products.map((product, index) => {
                    loadingEachPicture[index] = true;
                });

                setLoadingEachPicture(loadingEachPicture);
            })
            .catch(error => {
                console.error('There was an error fetching the products!', error);
            });
    }

    useEffect(() => {
        setLoading(true);
        getProducts()
    }, []);

    return (
        <WebAppLayout>
            <Head title="Products"/>

            <div className="mb-2">
                {categories.map((category, index) => (
                    <Badge key={index} className="text-md cursor-pointer m-1"
                           variant={selectedCategory === category.id ? 'default' : 'outline'}
                           onClick={() => filterByCategory(category.id, event)}
                    >{category.name}</Badge>
                ))}
            </div>

            <div className="">
                {products.map((product, index) => (
                    <Card className="w-full mb-2" key={index}>
                        <CardHeader>
                            <CardTitle>{product.name}</CardTitle>
                        </CardHeader>
                        <CardContent className="grid gap-4">
                            <div className=" flex items-center space-x-4 rounded-md border ">
                                {loading ? (
                                    <Skeleton className="h-[200px] w-full rounded-xl"/>
                                ) : (
                                    loadingEachPicture[product.id] ? (
                                        <Skeleton className="h-[200px] w-full rounded-xl"/>
                                    ) : (
                                        <img loading="lazy" src={`/storage/${product.image}`} alt=""
                                             onLoad={() => setLoadingEachPicture(prev => {
                                                 const newLoadingEachPicture = [...prev];
                                                 newLoadingEachPicture[product.id] = false;
                                                 return newLoadingEachPicture;
                                             })} className="border rounded-md"/>
                                    )
                                )}


                            </div>
                            <div className="flex flex-col space-y-3">
                                <div className="space-y-2">
                                    {loading ? (
                                        <Skeleton className="h-4 w-[200px]"/>
                                    ) : (
                                        <p>{product.short_description}</p>
                                    )}
                                </div>
                            </div>
                        </CardContent>
                        <CardFooter>
                            <Button className="w-full">
                                Use it
                            </Button>
                        </CardFooter>
                    </Card>
                ))}
            </div>
        </WebAppLayout>
    );
}
