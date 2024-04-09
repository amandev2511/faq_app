@include('includes.header')
<style>
    /* Let's highlight canvas boundaries */
    #gjs {
        border: 3px solid #444;
    }

    /* Reset some default styling */
    .gjs-cv-canvas {
        top: 0;
        width: 100%;
        height: 100%;
    }
</style>
</head>

<body>
    @foreach($template as $templates)
    <input type="hidden" id="shop_name" value="{{$shop}}">
    <input type="hidden" id="template_id" value="{{$templates['id']}}">
    <input type="hidden" id="css_data" value="{{$templates['css_data']}}">
    <div id="gjs">
    {!! $templates['html_data'] !!}
    </div>
    @endforeach
    <div id="blocks"></div>

</body>
@include('includes.footer')
<script>
    var shop_name = $('#shop_name').val();
    const editor = grapesjs.init({
        container: '#gjs',
        fromElement: true,
        storageManager: { autoload: false },
        plugins: ['gjs-preset-webpage'],
        // height: '300px',
        // width: 'auto',
        panels: {
            default: []
        },

        blockManager: {
            appendTo: '#blocks',
            blocks: [
                {
                    id: 'section', // id is mandatory
                    label: '<b>Section</b>', // You can use HTML/SVG inside labels
                    attributes: { class: 'gjs-block-section' },
                    content: `<section>
                            <h1>This is a simple title</h1>
                            <div>This is just a Lorem text: Lorem ipsum dolor sit amet</div>
                            </section>`,
                }, {
                    id: 'text',
                    label: 'Text',
                    content: '<div data-gjs-type="text">Insert your text here</div>',
                }, {
                    id: 'image',
                    label: 'Image',
                    media: `<svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                <path d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z" />
                            </svg>`,
                    // Select the component once it's dropped
                    select: true,
                    // You can pass components as a JSON instead of a simple HTML string,
                    // in this case we also use a defined component type `image`
                    content: { type: 'image' },
                    // This triggers `active` event on dropped components and the `image`
                    // reacts by opening the AssetManager
                    activate: true,
                }
            ]
        },

    });

    const addbutton = editor.Panels.addButton('options',
        [{
            id: 'save-db',
            className: 'fa fa-edit',
            command: 'save-db',
            attributes: {
                title: 'Update Changes'
            }
        }]
    );
    const css = {!! json_encode($template[0]['css_data']) !!};
    const template_id = $('#template_id').val();
    editor.setStyle(css);

    editor.Commands.add('save-db', {
        run: function (editor, sender) {
            sender && sender.set('active', 0); // turn off the button
            editor.store();
            //storing values to variables
            var htmldata = editor.getHtml();
            var cssdata = editor.getCss();
            $.post("{{url('update/template')}}"+"/"+template_id, {
                //you can get value in post by calling this name
                "htmldata": htmldata,
                "cssdata": cssdata,
                "shop_name": shop_name,
                success: function (data) {
                    alert('Template has been updated successfully');
                   window.location.href = "{{url('template')}}"+"/"+shop_name;
                }
            });
        }
    });

</script>

</html>