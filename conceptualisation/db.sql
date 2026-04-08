-- WARNING: This schema is for context only and is not meant to be run.
-- Table order and constraints may not be valid for execution.

CREATE TABLE public.cart_items (
  id_cart_item integer NOT NULL DEFAULT nextval('cart_items_id_cart_item_seq'::regclass),
  id_user uuid,
  id_product integer,
  qty integer NOT NULL,
  CONSTRAINT cart_items_pkey PRIMARY KEY (id_cart_item),
  CONSTRAINT cart_items_id_user_fkey FOREIGN KEY (id_user) REFERENCES auth.users(id),
  CONSTRAINT cart_items_id_product_fkey FOREIGN KEY (id_product) REFERENCES public.products(id_product)
);
CREATE TABLE public.contact_sheet (
  id_contact integer GENERATED ALWAYS AS IDENTITY NOT NULL,
  full_name character varying NOT NULL,
  email_contact character varying NOT NULL,
  message_contact character varying NOT NULL,
  subject_contact character varying NOT NULL,
  CONSTRAINT contact_sheet_pkey PRIMARY KEY (id_contact)
);
CREATE TABLE public.order_items (
  id_order_item integer NOT NULL DEFAULT nextval('order_items_id_order_item_seq'::regclass),
  id_order integer,
  id_product integer,
  qty integer NOT NULL,
  CONSTRAINT order_items_pkey PRIMARY KEY (id_order_item),
  CONSTRAINT order_items_id_order_fkey FOREIGN KEY (id_order) REFERENCES public.orders(id_commandes),
  CONSTRAINT order_items_id_product_fkey FOREIGN KEY (id_product) REFERENCES public.products(id_product)
);
CREATE TABLE public.orders (
  id_commandes integer GENERATED ALWAYS AS IDENTITY NOT NULL,
  created_at timestamp without time zone NOT NULL,
  total_order numeric NOT NULL,
  id_user uuid,
  CONSTRAINT orders_pkey PRIMARY KEY (id_commandes),
  CONSTRAINT orders_id_user_fkey FOREIGN KEY (id_user) REFERENCES auth.users(id)
);
CREATE TABLE public.products (
  id_product integer GENERATED ALWAYS AS IDENTITY NOT NULL,
  category_product character varying NOT NULL,
  name_product character varying NOT NULL,
  price_product integer NOT NULL,
  long_description character varying NOT NULL,
  short_description character varying NOT NULL,
  image_path character varying NOT NULL,
  ingredients text,
  weight character varying,
  origin character varying,
  shelf_life character varying,
  CONSTRAINT products_pkey PRIMARY KEY (id_product)
);
CREATE TABLE public.sav (
  id_sav integer GENERATED ALWAYS AS IDENTITY NOT NULL,
  email character varying NOT NULL,
  subject_sav character varying NOT NULL,
  id_user uuid NOT NULL,
  CONSTRAINT sav_pkey PRIMARY KEY (id_sav),
  CONSTRAINT sav_id_user_fkey FOREIGN KEY (id_user) REFERENCES auth.users(id)
);