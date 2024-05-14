PGDMP     ;                    |            postgres    14.1    15.3                 0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    13754    postgres    DATABASE     k   CREATE DATABASE postgres WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'ru';
    DROP DATABASE postgres;
                postgres    false                       0    0    DATABASE postgres    COMMENT     N   COMMENT ON DATABASE postgres IS 'default administrative connection database';
                   postgres    false    3345                        2615    24576    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                postgres    false                       0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                   postgres    false    5                       0    0    SCHEMA public    ACL     +   REVOKE USAGE ON SCHEMA public FROM PUBLIC;
                   postgres    false    5            �            1259    40960    comments    TABLE       CREATE TABLE public.comments (
    text_comment character varying,
    id_project character varying,
    username character varying,
    id character varying,
    date_comment character varying,
    id_comment integer NOT NULL,
    rating_comment character varying
);
    DROP TABLE public.comments;
       public         heap    postgres    false    5            �            1259    40965    comments_id_comment_seq    SEQUENCE     �   ALTER TABLE public.comments ALTER COLUMN id_comment ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.comments_id_comment_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    209    5            �            1259    40966    projects    TABLE       CREATE TABLE public.projects (
    id_project integer NOT NULL,
    cost_project character varying,
    name_project character varying,
    type_project character varying,
    img_project character varying,
    desc_project character varying,
    status_project character varying
);
    DROP TABLE public.projects;
       public         heap    postgres    false    5            �            1259    40971    products_id_product_seq    SEQUENCE     �   ALTER TABLE public.projects ALTER COLUMN id_project ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.products_id_product_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    5    211            �            1259    40972    requests    TABLE     G  CREATE TABLE public.requests (
    id_request integer NOT NULL,
    name_request character varying,
    name_company character varying,
    status_request character varying,
    id integer,
    username character varying,
    date_request character varying,
    description_request character varying,
    price_request character varying,
    document_request character varying,
    comment_request character varying,
    reliability_request character varying,
    manufacturability_request character varying,
    security_request character varying,
    documentation_equipment_request character varying,
    acceptance_request character varying,
    warranty_request character varying,
    program_request character varying,
    sign_request character varying,
    worker_request character varying,
    signed_request character varying
);
    DROP TABLE public.requests;
       public         heap    postgres    false    5            �            1259    40977    requests_id_request_seq    SEQUENCE     �   ALTER TABLE public.requests ALTER COLUMN id_request ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.requests_id_request_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    213    5            �            1259    40978    resume    TABLE     �  CREATE TABLE public.resume (
    id_resume integer NOT NULL,
    exp_resume character varying,
    skill_resume character varying,
    achiv_resume character varying,
    education_resume character varying,
    about_resume character varying,
    id integer,
    status_resume character varying,
    name_vacancy character varying,
    username character varying,
    email character varying
);
    DROP TABLE public.resume;
       public         heap    postgres    false    5            �            1259    40983    users    TABLE     �   CREATE TABLE public.users (
    email character varying(50),
    password character varying(50),
    id integer NOT NULL,
    login character varying,
    username character varying,
    admin character varying
);
    DROP TABLE public.users;
       public         heap    postgres    false    5            �            1259    40988    users_id_seq    SEQUENCE     �   ALTER TABLE public.users ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    216    5            �            1259    40989    vacancy    TABLE       CREATE TABLE public.vacancy (
    id_vacancy integer NOT NULL,
    name_vacancy character varying,
    respons_vacancy character varying,
    requir_vacancy character varying,
    conditions_vacancy character varying,
    status_vacancy character varying
);
    DROP TABLE public.vacancy;
       public         heap    postgres    false    5            �            1259    40994    vacancy_id_vacancy_seq    SEQUENCE     �   ALTER TABLE public.resume ALTER COLUMN id_resume ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.vacancy_id_vacancy_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    215    5            �            1259    40995    vacancy_id_vacancy_seq1    SEQUENCE     �   ALTER TABLE public.vacancy ALTER COLUMN id_vacancy ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.vacancy_id_vacancy_seq1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    218    5                       0    40960    comments 
   TABLE DATA           t   COPY public.comments (text_comment, id_project, username, id, date_comment, id_comment, rating_comment) FROM stdin;
    public          postgres    false    209   �'                 0    40966    projects 
   TABLE DATA           �   COPY public.projects (id_project, cost_project, name_project, type_project, img_project, desc_project, status_project) FROM stdin;
    public          postgres    false    211   T(                 0    40972    requests 
   TABLE DATA           �  COPY public.requests (id_request, name_request, name_company, status_request, id, username, date_request, description_request, price_request, document_request, comment_request, reliability_request, manufacturability_request, security_request, documentation_equipment_request, acceptance_request, warranty_request, program_request, sign_request, worker_request, signed_request) FROM stdin;
    public          postgres    false    213   !*                 0    40978    resume 
   TABLE DATA           �   COPY public.resume (id_resume, exp_resume, skill_resume, achiv_resume, education_resume, about_resume, id, status_resume, name_vacancy, username, email) FROM stdin;
    public          postgres    false    215   �-                 0    40983    users 
   TABLE DATA           L   COPY public.users (email, password, id, login, username, admin) FROM stdin;
    public          postgres    false    216   l0       	          0    40989    vacancy 
   TABLE DATA           �   COPY public.vacancy (id_vacancy, name_vacancy, respons_vacancy, requir_vacancy, conditions_vacancy, status_vacancy) FROM stdin;
    public          postgres    false    218   �2                  0    0    comments_id_comment_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.comments_id_comment_seq', 7, true);
          public          postgres    false    210                       0    0    products_id_product_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.products_id_product_seq', 25, true);
          public          postgres    false    212                       0    0    requests_id_request_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.requests_id_request_seq', 90, true);
          public          postgres    false    214                       0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 29, true);
          public          postgres    false    217                       0    0    vacancy_id_vacancy_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.vacancy_id_vacancy_seq', 14, true);
          public          postgres    false    219                       0    0    vacancy_id_vacancy_seq1    SEQUENCE SET     F   SELECT pg_catalog.setval('public.vacancy_id_vacancy_seq1', 10, true);
          public          postgres    false    220                l   x�KJ.KN*+KJ� N#��.��paǅ�vs���L��L8M9���ӊSҊ�R���j3NS�s.콰UB쿰��^��6�5��x���!朆\1z\\\ �H=         �  x�mR�n�0>;O1PE�d7���µ��v��'��{��Z	$$~� q�CYi�EK�+�߈qL�P�����O��?�o��[��\Q���~���y�W�tʓɼ�;�`��p�N��/�&Q��I��`��T�ڝ�̶�9��/�=/��=���
� ��+~����RA�Us^y���������)�|?�[1�d����S�U�7�4��;s'���e��^6�:c�QۃQ������H>���P
�)Õ^�<RC���PrnSjO]X	ZS��^�61<���Z(c_�H��<G��d]+��C�jn�V�@���}kg̈Z�F��Q��DX�A�򢚕3)e66(�kaX�O�rKw�g�Q�he�����P@F��~��B᯸{ �)�L�S�'�s.���ĝS���}4���iB�/�ݺH� ���l�         f  x��VKn�0]ӧ`/`�GI�DO�����n����)`�n�.��h�;��X��t�����Y�$E�8Eg��?q$��1%���niA��OtO+J��2���3A�)�o���=�pa�
P�%-����/t��@J%����J)�~��^��κ�}����p��O!��]Yq��l'�,[ر�>y��V܁�� �=Aϴ�����Gg�������﹘�qq��~dӵ�X��˟I�Zһ����r��D�Xc�!�3��z()�x�� R�Jkf�-�|�< �����OX!�sۣem�#�C�n�*A��^\��*�*�ʩmY��o�Wf�"�gI�"IצD�	3K��>�R�&���+p~���y�w����:��\��vw���ԃ�FV��$�B/̜R\�
x*����*8�{OT�����n���P�$-��#���7kd�?l�;�~e�[�x��A��H7��CZ`z������G�I��_��&Bt�0YH���Զ]��dvŅ����Ӎ�!����&t@o#�x{}�?�s���)��%O&o�a[�����t�6}=�M8)j����q<���vDw�Dʏ��*�!�(�K�tŇ���_�j=ʠ�bӚ2�(,^�kI_L iW&\�8�ҒJQ��N���V��f�3t���8����s��Ayv:ga?r���T��i�j�j�ّ�-�rXԾ��Ѭn@(黙i����7��^���_&m�]U�zQ�*'�c{�huan�ڭ�v/��7��t\�΂*r��]�>�N'�v��഼m�f��#iR�C�5���h
���g������6���8bW�����c��]=	��}��j����	         �  x��SKOQ^���fZDw�`���6cg��>h�-�-M0b�lP1ƍ���*��_8���{:S(�Jr�=�9�9�9���y���3E�iD�fϼ�ĥ�茭_���]E��>�1}�tL�.�wx��|���t�6�ӅK',���4��K�$tFC�\(oA�j�������մƯH� a�*ϩ��c����턱��f�'t
ÐkqQwb^�L\�O��Y���6�ABO�G\C��! ���@�.;��-��7����=L�s槽��*�j�(�`H%Q\�6���+��
Hc�7FU�
"�c�z���i�ܶ�.��]	�vSYMv��i��33�{���*+X�W��6
9���҄��.�y�ٲ^��I��SN���!I�����A��t���ak�:Ԭ���Yg3~C�yx��4�i�d��0:�����g�̛�����8��e^�B���&�Kɍ"�9$/M&%�B����yܲ�����/e�]����S�;��L��i�]P�6m��߬�S =_������F�x3�� ���RZt�Vւ�?��ꖬU���r������� l-��y��1���!���y-��՘����nń�;DX^��jn��xy�$�Mwi�m��z1�q�\�j�K�h3�E��Ĳ��A��^�<_o5ѻ/고ԋ/Dy
�UR�b���(W\�9^�A�����O�         8  x�M��n1�ϳO�'����[n\��8m�-QҊ�S�^�@�B����(-��o�lB�J��]������e��x���ӽ�))S"��uhC+l6%��H���J�C����U��7 �2>���!N��F���"(/�#�ڐS��HG�̀E.y�y2����G�:��2Q�M.9�Z�V��J��09���)V�����G��F�/��c8���]�E1�Lq�J�J�9,	���� j���)�y���Z{��R[D�-:Jl�E�.�%@;�/u�8����3�������~����`���O�'d\�m����h�'e��h�v�:���z9ĭ�t�	:��8!gX���Q}ۿ�/�6`qһ�q:>�g�C**J�f
�#$��k��V��S�a�j:��[��U��b�)#?�Uc�B!e@[�7kӮk(�g>��l�u�������9������t�ٔ����j=ɘ4�)�!<z)�+YYA�n���f�p؉��O$����^��чb�>ǒ���$]D@	l���z5��q��5���������������5h�      	   W  x��WMoU]ۿ�-ArB��|u�?@�U6�d	Rh��|R�V����i�X!��Lf<�_x�qν��؎��BQҙ7���sϽ�U���w}ڡ����"�}74]Ϳ�;q>ux�'�|v}ϧ��'���]~S1?M�u�lb������-��O���C�m�O�.��>��1G��=}�pT���_9?�P�K5,�����?]��g8��W�w��jX��N=�k�� �	��_⬄##�S�a��򵃃��o_��!� �9�x� ��]�݄��*S��,��!h�h�����dW����d)��]z.gWÅ���J����ș�����];�7A|�/���I�A3��!�(H$$�\�&1����I��RO�w��n�: �	f�*ʗ���F�XJ	��O��q]������%,��|;zE�}J*^U҆VN��3I���J!�bG ���ۨ��EL�!x��� ����t��?u�?����Z�I
˔K�Ԛ���ǲC$�%�{��� �J�5nB�.��{�)ψ�$ x�-\���D
��}��-8��l[�&ƌuhq8�G�I��SԦ�x�	��Jo<��������\D`y�jt����=�	G˵��Z�?�HO��D������Ym�=M�B�P!5�,��E��Q��/aPa�(��uk�L>0��M��<nY"�%[�b>T��t֥@9!y}O���J>�� ��_��K�3��1r�����S)�@�H�RA5L��ڍ���;���!����El����Ke�T[�lSLԦ4H6�*�)���F�5���8|��I�q7��]��dt��d��9�6�,	c3o(bd͜l�/��Q�0�H"��'����5�E�1���I%���M+*�UD���n90��g'_8�l>�t�:���[u�>�c����ܣ����ݝ��,�g��?/��d*�IXS�a"��?�:������Y{c"ᒿ��)����� Q(�>$�aO7��y\��J��	M����۲�+j�P�.��u��nc�I��\�m\в��`m��H_|{Q�j�U���{��Z��m!�����Ԋ�	rn'NȒNz�Æ���H5u�+��0���yxb�w�Ɍ�ޑ�����{2>�'���\�cWI����ݶ�@6��d#{�$%��XHe�DZT�c�P���ߤ_-����wY�#T��J�ɕ�d����O�U�oU�8C"6JoFKɕ�Ķs#��a�e�T��_�Jw�F���u�-|�t�H���"W�wj_ml︯�ݿ�u�g}�rc��[ۛ�l~�����O�i����[;v�Ń�o! Q(�xQ�>Y��O��E)Z]Y����z��/dT�     