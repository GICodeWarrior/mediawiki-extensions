# LICENCE: GPL3
import os.path
import simplejson as json
from select import select
from subprocess import Popen, PIPE
from sys import version_info

if version_info[0] < 3:
  from urllib import urlencode
else:
  from urllib.parse import urlencode

def p_ready(p):
  if p.poll() is not None or len(select([p.stdout], [], [], 0)[0]) > 0:
    return True
  else:
    return False

def success(data):
  if 'error' in data:
    return False
  else:
    return True

def to_json(data):
  try:
    data = json.loads(str(data.decode('utf8')))
    return data
  except:
    errstr = "<div class='error'>"

    if version_info[0] == 3:
      errstr = bytes(errstr, 'utf8')

    if errstr in data:
      error = data.replace(errstr, '')[:-6]
      return {'error':error}
    else:
      return {'error':"unknown error"}

class StatusNet:
  def __init__(self, acc):
    if type(acc) is dict:
      self.acc = acc
    else:
      return None
    self.source = 'python-statusnet'
    self.ext = '.json'

  def _request(self, path, params=None, post=None):
    auth_str = ':'.join( (self.acc['user'], self.acc['passwd']) )

    url = os.path.join(self.acc['api'], path)
    url += self.ext
    if params is not None:
      url += "?"+urlencode(params)

    cmd = ['curl', '-s', '-u', auth_str, url]

    if post is not None and type(post) is dict:
      cmd.append('-d')
      cmd.append(urlencode(post))

    return Popen(cmd, stdout=PIPE)

  # account verification
  def verify_creds(self):
    return self._request("account/verify_credentials")

  # notices
  def get(self, notice_id):
    return self._request("statuses/show/"+str(notice_id))

  def update(self, status, replyid=None):
    data = { 'status': status,
             'in_reply_to_status_id': replyid,
             'source': self.source }
    if replyid is not None:
      data['in_reply_to_status_id'] = replyid
    return self._request("statuses/update", post=data)

  def repeat(self, nid):
    data = {'source': self.source}
    return self._request("statuses/retweet/{0}".format(nid), post=data)

  def delete(self, notice_id):
    data = { 'id': notice_id }
    return self._request("statuses/destroy/{0}".format(notice_id), post=data)

  # direct messages
  def direct(self, user, msg):
    data = { 'screen_name': user 
           , 'text': msg }
    return self._request("direct_messages/new", post=data)

# def delete_direct(self, acc, id):
#   return self._request(acc, "direct_messages/destroy/"+str(id))

  # timelines
  def home(self, page=1, count=20):
    data = { 'page': page
           , 'count': count }
    return self._request("statuses/friends_timeline", data)

  def mentions(self, page=1, count=20, show_repeats=0):
    data = { 'page': page
           , 'count': count
           , 'include_rts': show_repeats }
    return self._request("statuses/mentions", data)

  def user_tl(self, user, page=1, count=20, show_repeats=0):
    data = { 'screen_name': user
           , 'page': page
           , 'count': count
           , 'include_rts': show_repeats }
    return self._request("statuses/user_timeline", data)

  def inbox(self, page=1, count=20):
    data = { 'page': page
           , 'count': count }
    return self._request("direct_messages", data)

  def outbox(self, page=1, count=20):
    data = { 'page': page
           , 'count': count }
    return self._request("direct_messages/sent", data)

  def public(self, page=1, count=20):
    data = { 'page': page
           , 'count': count }
    return self._request("statuses/public_timeline", data)

  # friends + followers
  def friends(self, user):
    data = { 'screen_name': user }
    return self._request("statuses/friends", data)

  def followers(self, user):
    data = { 'screen_name': user }
    return self._request("statuses/followers", data)

  # groups
  def groups(self, user=None, page=1):
    data = { 'page': page }
    if user is not None:
      data['screen_name'] = user
    else:
      data['screen_name'] = self.acc['user']
    return self._request("statusnet/groups/list", data)

  def group_tl(self, group, page=1, count=20):
    data = { 'page': page
           , 'count': count }
    return self._request("statusnet/groups/timeline/"+group, data)

  def group_join(self, group):
    return self._request("statusnet/groups/join/"+group)

  def group_leave(self, group):
    return self._request("statusnet/groups/leave/"+group)

  # subscriptions
  def follow(self, user_id):
    data = { 'user_id': user_id }
    return self._request("friendships/create", post=data)

  def unfollow(self, user_id):
    data = { 'user_id': user_id }
    return self._request("friendships/destroy", post=data)

  # favorites
  def favorites(self, user=None, page=1):
    data = { 'page': page }
    if user is not None:
      return self._request("favorites/"+user, data)
    else:
      return self._request("favorites", data)

  def favorite(self, notice_id):
    data = { 'id': notice_id }
    return self._request("favorites/create/"+str(notice_id), post=data)

  def unfavorite(self, notice_id):
    data = { 'id': notice_id }
    return self._request("favorites/destroy/"+str(notice_id), post=data)

  # blocks
  def block(self, user_id):
    data = { 'user_id': user_id }
    return self._request("blocks/create", post=data)

  def unblock(self, user_id):
    data = { 'user_id': user_id }
    return self._request("blocks/destroy", post=data)

# def get_blocks(self, page=1):
#   data = { "page": page }
#   return self._request("blocks/blocking", data)

  # searches
  def search(self, query, page=1, count=20):
    data = { 'q': query
           , 'page': page
           , 'count': count }
    return self._request("search", data)

  def tag_tl(self, tag, page=1, count=20):
    data = { 'page': page
           , 'count': count }
    return self._request("statusnet/tags/timeline/"+tag, data)

  # profile / config
  def update_profile(self, data):
    return self._request("account/update_profile", data)

  def config(self):
    return self._request("statusnet/config")
