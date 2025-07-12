--
-- PostgreSQL database dump
--

-- Dumped from database version 16.1
-- Dumped by pg_dump version 16.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: product; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.product (
    id integer NOT NULL,
    pr_name text,
    manufacturer text,
    quantity integer,
    price numeric,
    image_url text,
    CONSTRAINT product_price_check CHECK ((price > (0)::numeric)),
    CONSTRAINT product_quantity_check CHECK ((quantity >= 0))
);


ALTER TABLE public.product OWNER TO postgres;

--
-- Name: product_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.product_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.product_id_seq OWNER TO postgres;

--
-- Name: product_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.product_id_seq OWNED BY public.product.id;


--
-- Name: product id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product ALTER COLUMN id SET DEFAULT nextval('public.product_id_seq'::regclass);


--
-- Data for Name: product; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.product (id, pr_name, manufacturer, quantity, price, image_url) FROM stdin;
3	Стикерпак Сердце	Стикерпачечная	39	5	/CoolStore/CoolStore/pr_img\\stick_heart.png
5	Значок Белый на красном	Значковая	86	10	/CoolStore/CoolStore/pr_img\\pin_whiteonred.png
6	Значок Треугольники	Значковая	23	15	/CoolStore/CoolStore/pr_img\\pin_triangle.png
7	Значок Минимализм	Значковая	27	20	/CoolStore/CoolStore/pr_img\\pin_minimalism.png
8	Значок Сердешный	Значковая	42	25	/CoolStore/CoolStore/pr_img\\pin_heart.png
9	Значок Микросхема	Значковая	50	30	/CoolStore/CoolStore/pr_img\\pin_microchip.png
10	Обложка Минимализм	Обложковая	45	20	/CoolStore/CoolStore/pr_img\\cover_minimalism.png
11	Обложка Деловая	Обложковая	93	20	/CoolStore/CoolStore/pr_img\\cover_business.png
12	Обложка Красная	Обложковая	47	20	/CoolStore/CoolStore/pr_img\\cover_red.png
13	Обложка Белая	Обложковая	62	30	/CoolStore/CoolStore/pr_img\\cover_white.png
14	Обложка Синяя	Обложковая	57	35	/CoolStore/CoolStore/pr_img\\cover_blue.png
15	Обложка Сердце в кубе	Обложковая	25	40	/CoolStore/CoolStore/pr_img\\cover_heartincube.png
16	Блокнот Для умных заметок	Блокнотная	49	15	/CoolStore/CoolStore/pr_img\\notebook_forsmartnotes.png
17	Блокнот Чёрный	Блокнотная	96	20	/CoolStore/CoolStore/pr_img\\notebook_black.png
18	Блокнот Разноцветный	Блокнотная	84	20	/CoolStore/CoolStore/pr_img\\notebook_colored.png
19	Браслет Чёрный	Браслеточная	43	20	/CoolStore/CoolStore/pr_img\\bracelet_black.png
20	Браслет Красный	Браслеточная	60	30	/CoolStore/CoolStore/pr_img\\bracelet_red.png
21	Кружка Давид	Кружечная	27	50	/CoolStore/CoolStore/pr_img\\cup_david.png
22	Кружка Термо	Кружечная	75	60	/CoolStore/CoolStore/pr_img\\cup_thermo.png
23	Футболка Туть	Футболочная	59	60	/CoolStore/CoolStore/pr_img\\tshirt_there.png
24	Футболка Интеграл	Футболочная	83	60	/CoolStore/CoolStore/pr_img\\tshirt_integral.png
25	Футболка Давид	Футболочная	45	70	/CoolStore/CoolStore/pr_img\\tshirt_david.png
1	Стикерпак Компот	Стикерпачечная	8	5	/CoolStore/CoolStore/pr_img/stick_kompot.png
4	Значок Красный на белом	Значковая	31	10	/CoolStore/CoolStore/pr_img\\pin_redonwhite.png
2	Стикерпак Кот	Стикерпачечная	17	5	/CoolStore/CoolStore/pr_img\\stick_cat.png
26	Футболка Сердце в кубе	Футболочная	73	80	/CoolStore/CoolStore/pr_img\\tshirt_heartincube.png
27	Футболка Треугольнички	Футболочная	39	70	/CoolStore/CoolStore/pr_img\\tshirt_triangle.png
28	Шоппер Чёрный	Шоппероделочная	59	50	/CoolStore/CoolStore/pr_img\\shopper_black.png
29	Шоппер Белый	Шоппероделочная	81	20	/CoolStore/CoolStore/pr_img\\shopper_white.png
81	Значок1	Значковая	23	15	/CoolStore/CoolStore/pr_img/icon2.jpg
\.


--
-- Name: product_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.product_id_seq', 81, true);


--
-- Name: product product_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.product
    ADD CONSTRAINT product_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

