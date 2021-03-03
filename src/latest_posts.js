'use strict';


const tagToText = (node) => {
    let tag = document.createElement('div')
    tag.innerHTML = node
    node = tag.innerText
    return node
}

const shortenText = (text, startingPoint, maxLength) => {
    const unsplash = text.indexOf('Unsplash');
    let buffer = '...';
    if (unsplash != -1) {
        startingPoint = unsplash + 8;
        buffer = '';
    }
    const pexels = text.indexOf('Pexels');
    if (pexels != -1) {
        startingPoint = pexels + 6;
        buffer = '';
    }
    return text.length > maxLength ?
        buffer + text.slice(startingPoint, maxLength) + '...' :
        buffer + text + '...'
}

function Card({ post }) {
    return (
        <div className="panel panel-default">
            <div className="panel-body">
                <img src={post.thumbnail} className="card-img-top post-thumbnail" alt={post.title}></img>
                <ul className="list-group">
                    <li className="list-group-item">
                        <h5 className="card-title post-title"><a href={post.link} target="_blank">{post.title}</a></h5>
                        <p className="card-text post-preview">{shortenText(tagToText(post.content), 80, 250)}</p>
                        <br></br>
                    </li>
                </ul>
                <a href={post.link} className="btn btn-primary post-link" target="_blank">Read more</a>
            </div>
        </div>
    )
}


function CardsContainer({posts}) {
    if (posts != null) {
        const trimmed_posts = posts.length > 3 ? posts.slice(0, 3) : posts;
        const post_cards = trimmed_posts.map((post, index) => {
            return (
                <div key={index} className="col-xs-6 col-sm-6 col-md-4 card-col">
                    <Card post={post} />
                </div>
            );
        });
        return (
            <div className="row cards-container">
                {post_cards}
            </div>
        )
    } else {
        return (
            <div className="row">
                <div className="col-xs-12">No latest posts.</div>
            </div>
        );
    }
}


class LatestPosts extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            requestFailed: false,
            rss_url: props.mediumRSSFeedURL
        };
    }

    componentDidMount() {
        fetch('/config.json').then(data => data.json())
            .then((config) => {
                const urlForFeedToJson = `https://api.rss2json.com/v1/api.json?rss_url=${this.state.rss_url}&api_key=${config.rsstojson.api_key}`;
                fetch(urlForFeedToJson)
                    .then(response => {
                        if (!response.ok) {
                            throw Error("Network request failed")
                        }
                        return response
                    })
                    .then(data => data.json())
                    .then((data) => {
                        const dataItems = data.items;
                        const mediumPosts = dataItems.filter(item => item.categories.length > 0);
                        this.setState({
                            mediumPosts: mediumPosts
                        });
                    }, (error) => {
                        this.setState({
                            requestFailed: true,
                            error
                        });
                    });
            });
    }

    render() {
        return (
            <div className="container">
                <h1 className="section-title">Latest Posts</h1>
                <div className="spacer"></div>
                <CardsContainer posts={this.state.mediumPosts} />
                <div className="row more-at-medium">
                    <div className="col-xs-12 text-center">
                        <a href="https://robert-a-gutierrez.medium.com" className="btn btn-primary">View more posts on Medium</a>
                    </div>
                </div>
            </div>
        );
    }
}

let domContainer = document.querySelector('#latest-posts');
const rssFeedLink = domContainer.getAttribute('data-medium-rss');
ReactDOM.render(<LatestPosts mediumRSSFeedURL={rssFeedLink} />, domContainer);