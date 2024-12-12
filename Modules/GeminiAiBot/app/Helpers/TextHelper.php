<?php

namespace Modules\GeminiAiBot\Helpers;

class TextHelper
{

    public static function main()
    {
        return <<<EOF
# Welcome to **Gemini AI Bot** 🌟

Hello! 👋
I'm **Gemini AI Bot**, here to assist you with all your questions. 🤖✨

Feel free to ask me anything, and I’ll do my best to help you out. Whether it's **curiosity**, **advice**, or just a fun chat — I'm here for it! 🌙

### Ask your question below:
- 📚 **General knowledge**
- 🤔 **Deep thoughts**
- 🎮 **Fun facts**
- 💡 **Creative ideas**

Let's get started! Type your question and I'll respond. 🚀
EOF;

    }

    public static function rules()
    {
        return <<<EOF
Reponse: in HTML format:
<b>bold</b>, <strong>bold</strong>
<i>italic</i>, <em>italic</em>
<u>underline</u>, <ins>underline</ins>
<s>strikethrough</s>, <strike>strikethrough</strike>, <del>strikethrough</del>
<span class="tg-spoiler">spoiler</span>, <tg-spoiler>spoiler</tg-spoiler>
<b>bold <i>italic bold <s>italic bold strikethrough <span class="tg-spoiler">italic bold strikethrough spoiler</span></s> <u>underline italic bold</u></i> bold</b>
<a href="http://www.example.com/">inline URL</a>
<a href="tg://user?id=123456789">inline mention of a user</a>
<tg-emoji emoji-id="5368324170671202286">👍</tg-emoji>
<code>inline fixed-width code</code>
<pre>pre-formatted fixed-width code block</pre>
<pre><code class="language-python">pre-formatted fixed-width code block written in the Python programming language</code></pre>
<blockquote>Block quotation started\nBlock quotation continued\nThe last line of the block quotation</blockquote>
<blockquote expandable>Expandable block quotation started\nExpandable block quotation continued\nExpandable block quotation continued\nHidden by default part of the block quotation started\nExpandable block quotation continued\nThe last line of the block quotation</blockquote>
EOF;

    }

}
