@extends('layouts.app')

@section('content')

<section class="menu-section">

    <div class="container">

        <!-- Heading -->
        <div class="menu-heading text-center">
            <span>OUR SPECIAL MENU</span>
            <h1>Choose Your Favourite</h1>
            <p>Freshly prepared with love and served with passion.</p>
        </div>


        <!-- ================= CATEGORY BUTTONS ================= -->

        <div class="menu-categories">

            <button type="button"
                    class="menu-category active"
                    onclick="showMenu('coffee', this)">
                ☕ Coffee
            </button>

            <button type="button"
                    class="menu-category"
                    onclick="showMenu('burger', this)">
                🍔 Burger
            </button>

            <button type="button"
                    class="menu-category"
                    onclick="showMenu('tea', this)">
                🍵 Tea
            </button>

            <button type="button"
                    class="menu-category"
                    onclick="showMenu('pizza', this)">
                🍕 Pizza
            </button>

            <button type="button"
                    class="menu-category"
                    onclick="showMenu('dessert', this)">
                🍰 Dessert
            </button>

        </div>


        <!-- ================= COFFEE ================= -->

        <div class="menu-items active-menu" id="coffee">

            <div class="row g-4">

                <!-- Coffee 1 -->
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1510707577719-ae7c14805e3a?auto=format&fit=crop&w=800&q=80"
                             alt="Espresso">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Espresso</h3>
                                <span>₹120</span>
                            </div>

                            <p>Strong and rich espresso prepared from freshly roasted coffee beans.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <!-- Coffee 2 -->
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1534778101976-62847782c213?auto=format&fit=crop&w=800&q=80"
                             alt="Cappuccino">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Cappuccino</h3>
                                <span>₹160</span>
                            </div>

                            <p>Creamy cappuccino with smooth milk foam and rich coffee flavour.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <!-- Coffee 3 -->
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1461023058943-07fcbe16d735?auto=format&fit=crop&w=800&q=80"
                             alt="Cafe Latte">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Café Latte</h3>
                                <span>₹180</span>
                            </div>

                            <p>Silky smooth latte made with espresso and steamed milk.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <!-- Coffee 4 -->
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1572449043416-55f4685c9bb7?auto=format&fit=crop&w=800&q=80"
                             alt="Mocha">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Mocha</h3>
                                <span>₹190</span>
                            </div>

                            <p>Chocolate and coffee blended together for a delicious creamy drink.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <!-- Coffee 5 -->
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1517701604599-bb29b565090c?auto=format&fit=crop&w=800&q=80"
                             alt="Americano">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Americano</h3>
                                <span>₹140</span>
                            </div>

                            <p>Classic espresso mixed with hot water for a smooth coffee experience.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <!-- Coffee 6 -->
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1512568400610-62da28bc8a13?auto=format&fit=crop&w=800&q=80"
                             alt="Cold Coffee">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Cold Coffee</h3>
                                <span>₹170</span>
                            </div>

                            <p>Chilled creamy coffee served with a refreshing cold finish.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- ================= BURGER ================= -->

        <div class="menu-items" id="burger">

            <div class="row g-4">

                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?auto=format&fit=crop&w=800&q=80"
                             alt="Classic Burger">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Classic Burger</h3>
                                <span>₹180</span>
                            </div>

                            <p>Juicy vegetable patty with fresh lettuce, tomato and special sauce.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1553979459-d2229ba7433b?auto=format&fit=crop&w=800&q=80"
                             alt="Cheese Burger">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Cheese Burger</h3>
                                <span>₹220</span>
                            </div>

                            <p>Classic burger topped with melted cheese and fresh vegetables.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1594212699903-ec8a3eca50f5?auto=format&fit=crop&w=800&q=80"
                             alt="Double Burger">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Double Burger</h3>
                                <span>₹280</span>
                            </div>

                            <p>Double layers of delicious patties with fresh vegetables and sauce.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1572802419224-296b0aeee0d9?auto=format&fit=crop&w=800&q=80"
                             alt="Veggie Burger">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Veggie Burger</h3>
                                <span>₹190</span>
                            </div>

                            <p>Crispy veggie patty with fresh salad and creamy sauce.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1606755962773-d324e0a13086?auto=format&fit=crop&w=800&q=80"
                             alt="Spicy Burger">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Spicy Burger</h3>
                                <span>₹210</span>
                            </div>

                            <p>Spicy crispy patty combined with our special spicy sauce.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1550547660-d9450f859349?auto=format&fit=crop&w=800&q=80"
                             alt="Café Special Burger">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Café Special</h3>
                                <span>₹260</span>
                            </div>

                            <p>Our signature burger made specially for café lovers.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- ================= TEA ================= -->

        <div class="menu-items" id="tea">

            <div class="row g-4">

                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1571934811356-5cc061b6821f?auto=format&fit=crop&w=800&q=80"
                             alt="Masala Tea">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Masala Tea</h3>
                                <span>₹80</span>
                            </div>

                            <p>Traditional Indian tea prepared with aromatic spices.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1544787219-7f47ccb76574?auto=format&fit=crop&w=800&q=80"
                             alt="Green Tea">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Green Tea</h3>
                                <span>₹100</span>
                            </div>

                            <p>Light and refreshing green tea for a peaceful break.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1564890369478-c89ca6d9cde9?auto=format&fit=crop&w=800&q=80"
                             alt="Milk Tea">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Milk Tea</h3>
                                <span>₹70</span>
                            </div>

                            <p>Classic Indian milk tea with a rich and comforting taste.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1597318181409-cf64d0b5d8a2?auto=format&fit=crop&w=800&q=80"
                             alt="Ginger Tea">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Ginger Tea</h3>
                                <span>₹90</span>
                            </div>

                            <p>Warm tea infused with fresh ginger for a refreshing flavour.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1594631252845-29fc4cc8cde9?auto=format&fit=crop&w=800&q=80"
                             alt="Lemon Tea">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Lemon Tea</h3>
                                <span>₹90</span>
                            </div>

                            <p>Refreshing tea with a bright lemon flavour.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1556679343-c7306c1976bc?auto=format&fit=crop&w=800&q=80"
                             alt="Chai Latte">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Chai Latte</h3>
                                <span>₹150</span>
                            </div>

                            <p>Creamy tea with aromatic spices and a smooth finish.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- ================= PIZZA ================= -->

        <div class="menu-items" id="pizza">

            <div class="row g-4">

                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1574071318508-1cdbab80d002?auto=format&fit=crop&w=800&q=80"
                             alt="Margherita Pizza">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Margherita</h3>
                                <span>₹250</span>
                            </div>

                            <p>Classic pizza with tomato, mozzarella and fresh herbs.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=800&q=80"
                             alt="Veggie Pizza">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Veggie Pizza</h3>
                                <span>₹280</span>
                            </div>

                            <p>Loaded with fresh vegetables and delicious cheese.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1579751626657-72bc17010498?auto=format&fit=crop&w=800&q=80"
                             alt="Cheese Pizza">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Cheese Pizza</h3>
                                <span>₹300</span>
                            </div>

                            <p>Extra cheesy pizza for true cheese lovers.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1594007654729-407eedc4be65?auto=format&fit=crop&w=800&q=80"
                             alt="Farmhouse Pizza">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Farmhouse</h3>
                                <span>₹320</span>
                            </div>

                            <p>Fresh vegetables, cheese and herbs on a crispy crust.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1566843972142-a7fcb70de55a?auto=format&fit=crop&w=800&q=80"
                             alt="Paneer Pizza">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Paneer Pizza</h3>
                                <span>₹330</span>
                            </div>

                            <p>Indian-style pizza topped with delicious paneer.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1579751626657-72bc17010498?auto=format&fit=crop&w=800&q=80"
                             alt="Café Special Pizza">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Café Special</h3>
                                <span>₹350</span>
                            </div>

                            <p>Our special signature pizza made with premium ingredients.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- ================= DESSERT ================= -->

        <div class="menu-items" id="dessert">

            <div class="row g-4">

                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=800&q=80"
                             alt="Chocolate Cake">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Chocolate Cake</h3>
                                <span>₹180</span>
                            </div>

                            <p>Soft and rich chocolate cake with creamy chocolate topping.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1551024506-0bccd828d307?auto=format&fit=crop&w=800&q=80"
                             alt="Chocolate Donut">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Chocolate Donut</h3>
                                <span>₹100</span>
                            </div>

                            <p>Soft donut covered with delicious chocolate glaze.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?auto=format&fit=crop&w=800&q=80"
                             alt="Berry Cake">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Berry Cake</h3>
                                <span>₹220</span>
                            </div>

                            <p>Fresh creamy cake topped with delicious berries.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1571115177098-24ec42ed204d?auto=format&fit=crop&w=800&q=80"
                             alt="Brownie">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Chocolate Brownie</h3>
                                <span>₹150</span>
                            </div>

                            <p>Soft chocolate brownie with a rich and fudgy texture.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1488477181946-6428a0291777?auto=format&fit=crop&w=800&q=80"
                             alt="Cheesecake">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Cheesecake</h3>
                                <span>₹240</span>
                            </div>

                            <p>Creamy cheesecake with a smooth and delicious finish.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6">
                    <div class="menu-card">
                        <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?auto=format&fit=crop&w=800&q=80"
                             alt="Ice Cream">

                        <div class="menu-card-content">
                            <div class="menu-title">
                                <h3>Ice Cream</h3>
                                <span>₹120</span>
                            </div>

                            <p>Cold and creamy ice cream available in delicious flavours.</p>

                            <button class="order-btn">Order Now</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

</section>

@endsection