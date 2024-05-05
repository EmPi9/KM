PGDMP                         |            postgres    14.1    15.3 $               0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    13754    postgres    DATABASE     k   CREATE DATABASE postgres WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'ru';
    DROP DATABASE postgres;
                postgres    false                       0    0    DATABASE postgres    COMMENT     N   COMMENT ON DATABASE postgres IS 'default administrative connection database';
                   postgres    false    3352                        2615    24576    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                postgres    false                       0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                   postgres    false    5                       0    0    SCHEMA public    ACL     +   REVOKE USAGE ON SCHEMA public FROM PUBLIC;
                   postgres    false    5            �            1259    32768    comments    TABLE       CREATE TABLE public.comments (
    text_comment character varying,
    id_project character varying,
    username character varying,
    id character varying,
    date_comment character varying,
    id_comment integer NOT NULL,
    rating_comment character varying
);
    DROP TABLE public.comments;
       public         heap    postgres    false    5            �            1259    32773    comments_id_comment_seq    SEQUENCE     �   ALTER TABLE public.comments ALTER COLUMN id_comment ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.comments_id_comment_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    209    5            �            1259    32774    projects    TABLE       CREATE TABLE public.projects (
    id_project integer NOT NULL,
    cost_project character varying,
    name_project character varying,
    type_project character varying,
    img_project character varying,
    desc_project character varying,
    status_project character varying
);
    DROP TABLE public.projects;
       public         heap    postgres    false    5            �            1259    32779    products_id_product_seq    SEQUENCE     �   ALTER TABLE public.projects ALTER COLUMN id_project ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.products_id_product_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    5    211            �            1259    32780    requests    TABLE     G  CREATE TABLE public.requests (
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
       public         heap    postgres    false    5            �            1259    32785    requests_id_request_seq    SEQUENCE     �   ALTER TABLE public.requests ALTER COLUMN id_request ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.requests_id_request_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    5    213            �            1259    32786    resume    TABLE     �  CREATE TABLE public.resume (
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
       public         heap    postgres    false    5            �            1259    32791    status    TABLE     b   CREATE TABLE public.status (
    id_status integer NOT NULL,
    status_name character varying
);
    DROP TABLE public.status;
       public         heap    postgres    false    5            �            1259    32796    status_id_status_seq    SEQUENCE     �   ALTER TABLE public.status ALTER COLUMN id_status ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.status_id_status_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    5    216            �            1259    32797    users    TABLE     �   CREATE TABLE public.users (
    email character varying(50),
    password character varying(50),
    id integer NOT NULL,
    login character varying,
    username character varying,
    admin character varying
);
    DROP TABLE public.users;
       public         heap    postgres    false    5            �            1259    32802    users_id_seq    SEQUENCE     �   ALTER TABLE public.users ALTER COLUMN id ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    5    218            �            1259    32803    vacancy    TABLE       CREATE TABLE public.vacancy (
    id_vacancy integer NOT NULL,
    name_vacancy character varying,
    respons_vacancy character varying,
    requir_vacancy character varying,
    conditions_vacancy character varying,
    status_vacancy character varying
);
    DROP TABLE public.vacancy;
       public         heap    postgres    false    5            �            1259    32808    vacancy_id_vacancy_seq    SEQUENCE     �   ALTER TABLE public.resume ALTER COLUMN id_resume ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.vacancy_id_vacancy_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    215    5            �            1259    32809    vacancy_id_vacancy_seq1    SEQUENCE     �   ALTER TABLE public.vacancy ALTER COLUMN id_vacancy ADD GENERATED ALWAYS AS IDENTITY (
    SEQUENCE NAME public.vacancy_id_vacancy_seq1
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1
);
            public          postgres    false    220    5                      0    32768    comments 
   TABLE DATA           t   COPY public.comments (text_comment, id_project, username, id, date_comment, id_comment, rating_comment) FROM stdin;
    public          postgres    false    209   �+                 0    32774    projects 
   TABLE DATA           �   COPY public.projects (id_project, cost_project, name_project, type_project, img_project, desc_project, status_project) FROM stdin;
    public          postgres    false    211   h,       	          0    32780    requests 
   TABLE DATA           �  COPY public.requests (id_request, name_request, name_company, status_request, id, username, date_request, description_request, price_request, document_request, comment_request, reliability_request, manufacturability_request, security_request, documentation_equipment_request, acceptance_request, warranty_request, program_request, sign_request, worker_request, signed_request) FROM stdin;
    public          postgres    false    213   8.                 0    32786    resume 
   TABLE DATA           �   COPY public.resume (id_resume, exp_resume, skill_resume, achiv_resume, education_resume, about_resume, id, status_resume, name_vacancy, username, email) FROM stdin;
    public          postgres    false    215   ?1                 0    32791    status 
   TABLE DATA           8   COPY public.status (id_status, status_name) FROM stdin;
    public          postgres    false    216   �3                 0    32797    users 
   TABLE DATA           L   COPY public.users (email, password, id, login, username, admin) FROM stdin;
    public          postgres    false    218   �3                 0    32803    vacancy 
   TABLE DATA           �   COPY public.vacancy (id_vacancy, name_vacancy, respons_vacancy, requir_vacancy, conditions_vacancy, status_vacancy) FROM stdin;
    public          postgres    false    220   �5                  0    0    comments_id_comment_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.comments_id_comment_seq', 7, true);
          public          postgres    false    210                       0    0    products_id_product_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.products_id_product_seq', 25, true);
          public          postgres    false    212                       0    0    requests_id_request_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.requests_id_request_seq', 89, true);
          public          postgres    false    214                       0    0    status_id_status_seq    SEQUENCE SET     C   SELECT pg_catalog.setval('public.status_id_status_seq', 1, false);
          public          postgres    false    217                        0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 28, true);
          public          postgres    false    219            !           0    0    vacancy_id_vacancy_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public.vacancy_id_vacancy_seq', 12, true);
          public          postgres    false    221            "           0    0    vacancy_id_vacancy_seq1    SEQUENCE SET     E   SELECT pg_catalog.setval('public.vacancy_id_vacancy_seq1', 4, true);
          public          postgres    false    222               l   x�KJ.KN*+KJ� N#��.��paǅ�vs���L��L8M9���ӊSҊ�R���j3NS�s.콰UB쿰��^��6�5��x���!朆\1z\\\ �H=         �  x�mR�n�0>;O1��l��M��Kb;[K����?�,�V	�!@\�PVZ��R�
�7b����?G�of<�9M~�5��5��x�?qEx�\3�D���4���'�ywz����Ɲ>0�_�D���-�E����떸�;�uϢZY>��iB8�z8�1��R��MҌ����/\�����u/_���������3^�7 �[��_��t�	Ϫ9/���C�WTu�ܝ����ƴ�s\A��x3��}��.!�pg�ĝ����q��Tgl�=n{0j����#�6�r�=�Bu�p� ��á�J�mcJ��+A�g��B��A�&�'�tRe�r JF�<G��d]+�|�����Э;�Pe��Θ���05#$c"죍"լ�I)�q@�\Ò�K$_��_�=�뽯���!��(dQ��v�1ē��iE��ll�      	   �  x��UKr1]�S(�槙�9�7���l��T�
��E*���;��0��Z7�떠d�*C��iu?u��i婢��g�TЂ�tOS*�P�łJ{e�*Ta��3U���f*H��iFA�(h\���^�+F�I�Qi��y��i5�_��Tt+�;�a�g���cg��j�i��'+ۣ��Y4�h,n-mWS�1�i���)-�2on9��~~kG�W�#��R�۪��f�UD'�U�j�.��G�����y��;]�Gb�� f�<ۓM�`4Gf�~I3;R� o6	�%��v��I�|��<:m��q�=��J!#��5/���������ع�%^˧�eǍ���G����-\�yVq".98I�4�j�c�px&��-;�z�V4��#�]7n�ւ��V���#8��Za}�Y��o�糹&�ԑe�n�D�̉�aMQ)L�G�8�<{�0��:7{���r!�V��vo�!l"��¤�B_IL%�\�I8���&9�O��>"x�;%݉�xhG��Ne���L��[�d7>l͝ �e��g���I�xq��+��;�`� 0S{�=
L�=���"dGV��ܦ��r�}�nY:��5gyIwv�շš��m��'�=A���|���`K�080���q�;���S�,k��&\���x�5���{4W�^��� |�[Y�P�7i����pR��U�^&����dQX�Q���"U��݈��q���J1A�V�nH��h4��<�k         i  x��SKnA]ל�O`e�6�'���Rgb#Ei����DP�7|�$D4qbp���oī.��'�u���5�^���P\5<���	_�3��3�#��x��?��_��_��?�������pw��|Ƿx�w����m�1<�{�d|�c��Q�M	�<�Ņ9_�	�9~G�	3�p{ǿU�	� d��(�3�O���p1���W!����?�(2\@���ğ����� j�����>��\�;d�o���Mj��U��tk/�X����=�� ����L@��)X���p��	N�ͣt��x���iX����4K�+R��!�J�Q��� �䩰�Ba��=t�5�a���7�֥�]�S��6��	�tBޑ��B(��B�Y�:J��NX�:9���9i�ҟ�:C0���o �x=Bz�C�}"����ſ:�g����ʾ�֌�#Y#o!���S��4�'�v��"f_�ԙ7FHl����f�B7�)$h�6���9��˕$)W����.}�6\ݦ�c�e��i�-����4j��f��Y���y�B����S����2V ����MFcE��03-�U����f��8�)EQ��m��            x������ � �           x�M��n1�ϳO�'���Y�� \�k;i�DUJEũ�P/H �!�	�QZ�3x߈٤M"ٲv���o�oR�2>��������1�zO�C�|Q>ƶ��R�	���H+��uY��m�ݔ�D��l�C�4�ge,%L�eg��b���&��͂�T����"Ϸ,-ꎬ�Ʊ�>R����B.�a:��](V����?F�P��I�U�9����~bU\ȮP6�#e"���e���~�U����|��银����!�0�;�B���V�k]
β��"�e��}7���F���[XlN/�����K�����c�w:���bHp���y�[o��rStT�IC���Ϩ��_�Wu�?���1���� ��am$L%q��9�V�d�$� |r.s4`��b��l��[+^qB���%c��&F@� ����~=��qmˍ���[��+�t�4_�,���L,T�q�$o���2�`"�o��q#^��/G���^>�=���<:h��?nbP�         �  x��W�n�F}��b[�V'}i~��Ї~�$��*�'@#��@�
��.4)����G=gf��$Jv��0��ݝ33g�L���_��s��q��_�c?C����V����#_�S���ԗ�w�¯�`�_�!���l��Ջ��N~����sY��ّ��t��(�Ӻ� r�?��g��r]&���
����/հ�»��f��o��׊gx��[���{�|�c���)���w��e8���&����G�sq:����Z0��0����>W�C�Y6����� �H�0���V�[\���f���e�^|��5s�/t�R&� j0j&h���e�L�U�Iy�Fk�(I�%�,��Rp�a�q�}Z�S����?�?�lȅ3r�˙W|#W,���f�;H.1�_���>�k
?�������(��.��U�N�\�s	���^)��& �$���Ȏ�"'����H�)���@�?���C���VnYEVRR�p_
D����3�[2�Z*�W
ۍ2��X�&��i)��h�<'?p���/�$��{%���c� ��{]�,�\$���bՍ�y�K�x��x�H��	o\���Ask�n�XѨ�͑޵0r�ga2�=���;lY�F�z�U�+�dMw�;r`����$DD��Oc�I41J���^�)�eK���j.�����2�#Q����K�)���B�����j�: �x��A?����F�Wr�s�������$r�\$�LX�@{0�@V�A@^�P��/r{_�$�~c[��x ��d�:h`rmF�T��B�;����QK\��Mû-v2�]� /H��v���n����iy���W�6�fA�>�ג�hl�H%��Ij�q�ü(4fC�~���ԜX�Y#eQ��(���3G�qB�4yꄳņ��x:���#����F�7l��}�ݱ9�ֿ�wu5�J厣�b�5t�pa[���
)�=����|�ܘ���/�i�+:�5��,L�y��_Js8��紦D��Ut�?
fa�}���RW}#�ܴ2��򷋯�6f!�V������%��v֦(lY	��M��Uu�t�GM��M���^�V ���EL@\S%��֌���V6uګ���Tz^[���0���#�'���1�q�B�gi�D�lD�JJ�oh���y�"k�ےP�r!�QfeQ/���l��&�f �ϭ�<f�NZR��J���P"�PM�7�*)�&f�!�5�v*9ҡ��tnB^%�]�h�;z�f�tM���'�>K��$�WL�O�'�~��̔��     