'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

var tagToText = function tagToText(node) {
    var tag = document.createElement('div');
    tag.innerHTML = node;
    node = tag.innerText;
    return node;
};

var shortenText = function shortenText(text, startingPoint, maxLength) {
    var unsplash = text.indexOf('Unsplash');
    var buffer = '...';
    if (unsplash != -1) {
        startingPoint = unsplash + 8;
        buffer = '';
    }
    var pexels = text.indexOf('Pexels');
    if (pexels != -1) {
        startingPoint = pexels + 6;
        buffer = '';
    }
    return text.length > maxLength ? buffer + text.slice(startingPoint, maxLength) + '...' : buffer + text + '...';
};

function Card(_ref) {
    var post = _ref.post;

    return React.createElement(
        'div',
        { className: 'panel panel-default' },
        React.createElement(
            'div',
            { className: 'panel-body' },
            React.createElement('img', { src: post.thumbnail, className: 'card-img-top post-thumbnail', alt: post.title }),
            React.createElement(
                'ul',
                { className: 'list-group' },
                React.createElement(
                    'li',
                    { className: 'list-group-item' },
                    React.createElement(
                        'h5',
                        { className: 'card-title post-title' },
                        React.createElement(
                            'a',
                            { href: post.link, target: '_blank' },
                            post.title
                        )
                    ),
                    React.createElement(
                        'p',
                        { className: 'card-text post-preview' },
                        shortenText(tagToText(post.content), 80, 250)
                    ),
                    React.createElement('br', null)
                )
            ),
            React.createElement(
                'a',
                { href: post.link, className: 'btn btn-primary post-link', target: '_blank' },
                'Read more'
            )
        )
    );
}

function CardsContainer(_ref2) {
    var posts = _ref2.posts,
        active = _ref2.active;

    if (posts != null) {
        var trimmed_posts = posts.length > 3 ? posts.slice(4) : posts;
        var post_cards = trimmed_posts.map(function (post, index) {
            return React.createElement(
                'div',
                { key: post.guid, className: 'col-xs-6 col-sm-6 col-md-4 card-col' },
                React.createElement(Card, { post: post })
            );
        });
        return React.createElement(
            'div',
            { className: 'row cards-container' },
            post_cards
        );
    } else {
        return React.createElement(
            'div',
            { className: 'row' },
            React.createElement(
                'div',
                { className: 'col-xs-12' },
                'No latest posts.'
            )
        );
    }
}

var LatestPosts = function (_React$Component) {
    _inherits(LatestPosts, _React$Component);

    function LatestPosts(props) {
        _classCallCheck(this, LatestPosts);

        var _this = _possibleConstructorReturn(this, (LatestPosts.__proto__ || Object.getPrototypeOf(LatestPosts)).call(this, props));

        _this.state = {
            requestFailed: false,
            active: 0,
            rss_url: props.mediumRSSFeedURL
        };
        return _this;
    }

    _createClass(LatestPosts, [{
        key: 'componentDidMount',
        value: function componentDidMount() {
            var _this2 = this;

            var urlForFeedToJson = 'https://api.rss2json.com/v1/api.json?rss_url=' + this.state.rss_url;
            fetch(urlForFeedToJson).then(function (response) {
                if (!response.ok) {
                    throw Error("Network request failed");
                }
                return response;
            }).then(function (data) {
                return data.json();
            }).then(function (data) {
                var dataItems = data.items;
                var mediumPosts = dataItems.filter(function (item) {
                    return item.categories.length > 0;
                });
                _this2.setState({
                    mediumPosts: mediumPosts
                });
            }, function (error) {
                _this2.setState({
                    requestFailed: true,
                    error: error
                });
            });
        }
    }, {
        key: 'render',
        value: function render() {
            return React.createElement(
                'div',
                { className: 'container' },
                React.createElement(
                    'h1',
                    { className: 'section-title' },
                    'Latest Posts'
                ),
                React.createElement('div', { className: 'spacer' }),
                React.createElement(CardsContainer, { posts: this.state.mediumPosts, active: this.state.active }),
                React.createElement(
                    'div',
                    { className: 'row more-at-medium' },
                    React.createElement(
                        'div',
                        { className: 'col-xs-12 text-center' },
                        React.createElement(
                            'a',
                            { href: 'https://robert-a-gutierrez.medium.com', className: 'btn btn-primary' },
                            'View more posts on Medium'
                        )
                    )
                )
            );
        }
    }]);

    return LatestPosts;
}(React.Component);

var domContainer = document.querySelector('#latest-posts');
var rssFeedLink = domContainer.getAttribute('data-medium-rss');
ReactDOM.render(React.createElement(LatestPosts, { mediumRSSFeedURL: rssFeedLink }), domContainer);