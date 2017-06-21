require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    data() {
        return {
            app: {
                information: false,
                active: true
            },
            emojis: window.emojis,
            step: 0,
            semantic: '',
            pragmatic: ''
        };
    },
    methods: {

        showInformation() {
            this.app.information = true;
        },
        hideInformation() {
            this.app.information = false;
        },

        showEmoji() {

            let code = `:${this.emojis[this.step].short}:`;

            let emoji = new EmojiConvertor();
            emoji.img_sets.apple.path = 'img/apple/160/';
            emoji.img_set = 'apple';
            emoji.use_sheet = false;
            emoji.replace_mode = 'img';

            document.querySelector('.Emoji > p').innerHTML = emoji.replace_colons(code);


        },
        nextEmoji() {

            this.storeEmojiData();

            if(this.isNotFinalEmoji() && this.canProgress()){

                this.semantic = '';
                this.pragmatic = '';

                this.step += 1;
                this.showEmoji();
                document.getElementById('semantic').focus();

            }

            if(!this.isNotFinalEmoji()) {
                this.save();
            }

        },
        canProgress() {
            if(this.semantic.trim() != '') {
                return true;
            }
            return false;
        },
        isNotFinalEmoji() {
            if((this.emojis.length - 1) > this.step){
                return true;
            }
            return false
        },
        storeEmojiData() {

            this.emojis[this.step]['semantic'] = this.semantic;
            this.emojis[this.step]['pragmatic'] = this.pragmatic;

        },
        save() {

            axios.post('save', {
                data: JSON.stringify(this.emojis)
            }).then(() => {

            });

            this.app.active = false;

        },
        restart() {

            axios.get('restart').then((response) => {

                console.log(response);

                this.emojis = response.data;

                this.step = 0;
                this.app.active = true;
                document.getElementById('semantic').focus();

            });

        }
    },
    mounted() {
        this.showEmoji();
        document.getElementById('semantic').focus();
    }
});
