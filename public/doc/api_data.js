define({ "api": [
  {
    "type": "get",
    "url": "/Base/captcha",
    "title": "02、图片验证码地址",
    "group": "Base",
    "version": "1.0.0",
    "description": "<p>图片验证码</p>",
    "success": {
      "examples": [
        {
          "title": "01 调用示例",
          "content": "<img src=\"http://xxxx.com/Base/captcha\" onClick=\"this.src=this.src+'?'+Math.random()\" alt=\"点击刷新验证码\">",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Base.php",
    "groupTitle": "Base",
    "name": "GetBaseCaptcha"
  },
  {
    "type": "post",
    "url": "/Base/upload",
    "title": "01、图片上传",
    "group": "Base",
    "version": "1.0.0",
    "description": "<p>图片上传</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码  201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回图片地址</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Base.php",
    "groupTitle": "Base",
    "name": "PostBaseUpload"
  },
  {
    "type": "get",
    "url": "/Member/get_member_menu",
    "title": "07、获取路由信息与侧边栏",
    "group": "Member",
    "version": "1.0.0",
    "description": "<p>获取路由信息与侧边栏</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回数据详情</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\"201\",\"msg\":\"没有数据\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Member.php",
    "groupTitle": "Member",
    "name": "GetMemberGet_member_menu"
  },
  {
    "type": "get",
    "url": "/Member/index",
    "title": "01、账号列表",
    "group": "Member",
    "version": "1.0.0",
    "description": "<p>账号列表</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "limit",
            "description": "<p>每页数据条数（默认20）</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "page",
            "description": "<p>当前页码</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "name",
            "description": "<p>姓名</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "user_name",
            "description": "<p>账号</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "mobile",
            "description": "<p>手机号</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "role",
            "description": "<p>角色</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "create_time_start",
            "description": "<p>创建时间开始</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "create_time_end",
            "description": "<p>创建时间结束</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回数据</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data.list",
            "description": "<p>返回数据列表</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data.count",
            "description": "<p>返回数据总数</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"查询失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Member.php",
    "groupTitle": "Member",
    "name": "GetMemberIndex"
  },
  {
    "type": "get",
    "url": "/Member/view",
    "title": "04、查看账号详情",
    "group": "Member",
    "version": "1.0.0",
    "description": "<p>查看详情</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "member_id",
            "description": "<p>主键ID</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回数据详情</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\"201\",\"msg\":\"没有数据\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Member.php",
    "groupTitle": "Member",
    "name": "GetMemberView"
  },
  {
    "type": "get",
    "url": "/MemberMenu/index",
    "title": "01、菜单列表",
    "group": "MemberMenu",
    "version": "1.0.0",
    "description": "<p>菜单列表</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "limit",
            "description": "<p>每页数据条数（默认20）</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "page",
            "description": "<p>当前页码</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "menu_name",
            "description": "<p>菜单名称</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "url",
            "description": "<p>菜单URL</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "redirect",
            "description": "<p>重定向</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "route_url",
            "description": "<p>路由name</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "route_path",
            "description": "<p>路由组件路径</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "pid",
            "description": "<p>上级菜单</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "menu_ico",
            "description": "<p>菜单图标</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "broadside_status",
            "description": "<p>侧边显示 否|1,是|2</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "create_time_start",
            "description": "<p>创建时间开始</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "create_time_end",
            "description": "<p>创建时间结束</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回数据</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data.list",
            "description": "<p>返回数据列表</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data.count",
            "description": "<p>返回数据总数</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"查询失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/MemberMenu.php",
    "groupTitle": "MemberMenu",
    "name": "GetMembermenuIndex"
  },
  {
    "type": "get",
    "url": "/MemberMenu/view",
    "title": "04、查看菜单详情",
    "group": "MemberMenu",
    "version": "1.0.0",
    "description": "<p>查看详情</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "member_menu_id",
            "description": "<p>主键ID</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回数据详情</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\"201\",\"msg\":\"没有数据\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/MemberMenu.php",
    "groupTitle": "MemberMenu",
    "name": "GetMembermenuView"
  },
  {
    "type": "post",
    "url": "/MemberMenu/add",
    "title": "02、添加菜单",
    "group": "MemberMenu",
    "version": "1.0.0",
    "description": "<p>添加</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "menu_name",
            "description": "<p>菜单名称 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "url",
            "description": "<p>菜单URL (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "redirect",
            "description": "<p>重定向</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "route_url",
            "description": "<p>路由name (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "route_path",
            "description": "<p>路由组件路径</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "pid",
            "description": "<p>上级菜单</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": false,
            "field": "menu_order",
            "description": "<p>显示顺序 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "menu_ico",
            "description": "<p>菜单图标</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": false,
            "field": "broadside_status",
            "description": "<p>侧边显示 (必填) 否|1,是|2</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码  201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/MemberMenu.php",
    "groupTitle": "MemberMenu",
    "name": "PostMembermenuAdd"
  },
  {
    "type": "post",
    "url": "/MemberMenu/soft_delete",
    "title": "05、删除菜单",
    "group": "MemberMenu",
    "version": "1.0.0",
    "description": "<p>删除菜单</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "member_menu_ids",
            "description": "<p>主键id 注意后面跟了s 多数据删除</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"msg\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\"201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/MemberMenu.php",
    "groupTitle": "MemberMenu",
    "name": "PostMembermenuSoft_delete"
  },
  {
    "type": "post",
    "url": "/MemberMenu/update",
    "title": "03、修改菜单",
    "group": "MemberMenu",
    "version": "1.0.0",
    "description": "<p>修改</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "member_menu_id",
            "description": "<p>主键ID (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "menu_name",
            "description": "<p>菜单名称 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "url",
            "description": "<p>菜单URL (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "redirect",
            "description": "<p>重定向</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "route_url",
            "description": "<p>路由name (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "route_path",
            "description": "<p>路由组件路径</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "pid",
            "description": "<p>上级菜单</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": false,
            "field": "menu_order",
            "description": "<p>显示顺序 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "menu_ico",
            "description": "<p>菜单图标</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": false,
            "field": "broadside_status",
            "description": "<p>侧边显示 (必填) 否|1,是|2</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码  201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"msg\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/MemberMenu.php",
    "groupTitle": "MemberMenu",
    "name": "PostMembermenuUpdate"
  },
  {
    "type": "post",
    "url": "/Member/add",
    "title": "02、添加账号",
    "group": "Member",
    "version": "1.0.0",
    "description": "<p>添加</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "name",
            "description": "<p>姓名 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "user_name",
            "description": "<p>账号 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>密码 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "mobile",
            "description": "<p>手机号 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": false,
            "field": "role",
            "description": "<p>角色</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码  201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Member.php",
    "groupTitle": "Member",
    "name": "PostMemberAdd"
  },
  {
    "type": "post",
    "url": "/Member/member_login",
    "title": "05、账号登录",
    "group": "Member",
    "version": "1.0.0",
    "description": "<p>账号密码登录</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "user_name",
            "description": "<p>登录用户名</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>登录密码</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"msg\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\"201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Member.php",
    "groupTitle": "Member",
    "name": "PostMemberMember_login"
  },
  {
    "type": "post",
    "url": "/Member/soft_delete",
    "title": "06、删除账号",
    "group": "Member",
    "version": "1.0.0",
    "description": "<p>删除账号</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "member_ids",
            "description": "<p>主键id 注意后面跟了s 多数据删除</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"msg\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\"201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Member.php",
    "groupTitle": "Member",
    "name": "PostMemberSoft_delete"
  },
  {
    "type": "post",
    "url": "/Member/update",
    "title": "03、修改账号",
    "group": "Member",
    "version": "1.0.0",
    "description": "<p>修改</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "member_id",
            "description": "<p>主键ID (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "name",
            "description": "<p>姓名 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "user_name",
            "description": "<p>账号 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>密码 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "mobile",
            "description": "<p>手机号 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": false,
            "field": "role",
            "description": "<p>角色</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码  201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"msg\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Member.php",
    "groupTitle": "Member",
    "name": "PostMemberUpdate"
  },
  {
    "type": "get",
    "url": "/MemberRole/index",
    "title": "01、角色列表",
    "group": "MemberRole",
    "version": "1.0.0",
    "description": "<p>角色列表</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "limit",
            "description": "<p>每页数据条数（默认20）</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "page",
            "description": "<p>当前页码</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "role_name",
            "description": "<p>角色名</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "status",
            "description": "<p>状态 启动|1,禁用|2</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "type",
            "description": "<p>类型 教师|1,管理|2</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回数据</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data.list",
            "description": "<p>返回数据列表</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data.count",
            "description": "<p>返回数据总数</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"查询失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/MemberRole.php",
    "groupTitle": "MemberRole",
    "name": "GetMemberroleIndex"
  },
  {
    "type": "get",
    "url": "/MemberRole/view",
    "title": "04、查看角色详情",
    "group": "MemberRole",
    "version": "1.0.0",
    "description": "<p>查看详情</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "member_role_id",
            "description": "<p>主键ID</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回数据详情</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\"201\",\"msg\":\"没有数据\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/MemberRole.php",
    "groupTitle": "MemberRole",
    "name": "GetMemberroleView"
  },
  {
    "type": "post",
    "url": "/MemberRole/add",
    "title": "02、添加角色",
    "group": "MemberRole",
    "version": "1.0.0",
    "description": "<p>添加</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "role_name",
            "description": "<p>角色名 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": false,
            "field": "status",
            "description": "<p>状态 (必填) 启动|1,禁用|2</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": false,
            "field": "type",
            "description": "<p>类型 (必填) 教师|1,管理|2</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码  201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/MemberRole.php",
    "groupTitle": "MemberRole",
    "name": "PostMemberroleAdd"
  },
  {
    "type": "post",
    "url": "/MemberRole/set_role_menu",
    "title": "06、设置角色菜单",
    "group": "MemberRole",
    "version": "1.0.0",
    "description": "<p>编辑数据</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "member_role_id",
            "description": "<p>主键ID (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "role_menu",
            "description": "<p>角色菜单</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码  201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"msg\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/MemberRole.php",
    "groupTitle": "MemberRole",
    "name": "PostMemberroleSet_role_menu"
  },
  {
    "type": "post",
    "url": "/MemberRole/soft_delete",
    "title": "05、删除角色",
    "group": "MemberRole",
    "version": "1.0.0",
    "description": "<p>删除角色</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "member_role_ids",
            "description": "<p>主键id 注意后面跟了s 多数据删除</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"msg\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\"201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/MemberRole.php",
    "groupTitle": "MemberRole",
    "name": "PostMemberroleSoft_delete"
  },
  {
    "type": "post",
    "url": "/MemberRole/update",
    "title": "03、修改角色",
    "group": "MemberRole",
    "version": "1.0.0",
    "description": "<p>修改</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "member_role_id",
            "description": "<p>主键ID (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "role_name",
            "description": "<p>角色名 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": false,
            "field": "status",
            "description": "<p>状态 (必填) 启动|1,禁用|2</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": false,
            "field": "type",
            "description": "<p>类型 (必填) 教师|1,管理|2</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码  201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"msg\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/MemberRole.php",
    "groupTitle": "MemberRole",
    "name": "PostMemberroleUpdate"
  },
  {
    "type": "get",
    "url": "/Student/index",
    "title": "01、学生列表",
    "group": "Student",
    "version": "1.0.0",
    "description": "<p>学生列表</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "limit",
            "description": "<p>每页数据条数（默认20）</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "page",
            "description": "<p>当前页码</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "student_name",
            "description": "<p>姓名</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "class_name",
            "description": "<p>班级名称</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "family_mobile",
            "description": "<p>家长手机号</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "id_card",
            "description": "<p>身份证号</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": true,
            "field": "role",
            "description": "<p>角色</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "create_time_start",
            "description": "<p>创建时间开始</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": true,
            "field": "create_time_end",
            "description": "<p>创建时间结束</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回数据</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data.list",
            "description": "<p>返回数据列表</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data.count",
            "description": "<p>返回数据总数</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"查询失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Student.php",
    "groupTitle": "Student",
    "name": "GetStudentIndex"
  },
  {
    "type": "get",
    "url": "/Student/view",
    "title": "04、查看学生详情",
    "group": "Student",
    "version": "1.0.0",
    "description": "<p>查看详情</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "student_id",
            "description": "<p>主键ID</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.data",
            "description": "<p>返回数据详情</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\"201\",\"msg\":\"没有数据\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Student.php",
    "groupTitle": "Student",
    "name": "GetStudentView"
  },
  {
    "type": "post",
    "url": "/Student/add",
    "title": "02、添加或导入学生",
    "group": "Student",
    "version": "1.0.0",
    "description": "<p>添加</p>",
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "student_name",
            "description": "<p>姓名 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "class_name",
            "description": "<p>班级名称</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": false,
            "field": "class_id",
            "description": "<p>班级id</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "family_mobile",
            "description": "<p>家长手机号 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "id_card",
            "description": "<p>身份证号</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码  201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"data\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Student.php",
    "groupTitle": "Student",
    "name": "PostStudentAdd"
  },
  {
    "type": "post",
    "url": "/Student/change_password",
    "title": "06、修改密码",
    "group": "Student",
    "version": "1.0.0",
    "description": "<p>修改密码</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "student_id",
            "description": "<p>主键ID</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "password",
            "description": "<p>新密码(必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "repassword",
            "description": "<p>重复密码(必填)</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"msg\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\"201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Student.php",
    "groupTitle": "Student",
    "name": "PostStudentChange_password"
  },
  {
    "type": "post",
    "url": "/Student/update",
    "title": "03、修改学生",
    "group": "Student",
    "version": "1.0.0",
    "description": "<p>修改</p>",
    "parameter": {
      "fields": {
        "输入参数：": [
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "student_id",
            "description": "<p>主键ID (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "student_name",
            "description": "<p>姓名 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "class_name",
            "description": "<p>班级名称</p>"
          },
          {
            "group": "输入参数：",
            "type": "int",
            "optional": false,
            "field": "class_id",
            "description": "<p>班级id</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "family_mobile",
            "description": "<p>家长手机号 (必填)</p>"
          },
          {
            "group": "输入参数：",
            "type": "string",
            "optional": false,
            "field": "id_card",
            "description": "<p>身份证号</p>"
          }
        ],
        "失败返回参数：": [
          {
            "group": "失败返回参数：",
            "type": "object",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码  201</p>"
          },
          {
            "group": "失败返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回错误消息</p>"
          }
        ],
        "成功返回参数：": [
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array",
            "description": "<p>返回结果集</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.status",
            "description": "<p>返回错误码 200</p>"
          },
          {
            "group": "成功返回参数：",
            "type": "string",
            "optional": false,
            "field": "array.msg",
            "description": "<p>返回成功消息</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "type": "String",
            "optional": false,
            "field": "Authorization",
            "description": "<p>用户授权token</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Header-示例:",
          "content": "\"Authorization: eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOjM2NzgsImF1ZGllbmNlIjoid2ViIiwib3BlbkFJZCI6MTM2NywiY3JlYXRlZCI6MTUzMzg3OTM2ODA0Nywicm9sZXMiOiJVU0VSIiwiZXhwIjoxNTM0NDg0MTY4fQ.Gl5L-NpuwhjuPXFuhPax8ak5c64skjDTCBC64N_QdKQ2VT-zZeceuzXB9TqaYJuhkwNYEhrV3pUx1zhMWG7Org\"",
          "type": "json"
        }
      ]
    },
    "success": {
      "examples": [
        {
          "title": "01 成功示例",
          "content": "{\"status\":\"200\",\"msg\":\"操作成功\"}",
          "type": "json"
        }
      ]
    },
    "error": {
      "examples": [
        {
          "title": "02 失败示例",
          "content": "{\"status\":\" 201\",\"msg\":\"操作失败\"}",
          "type": "json"
        }
      ]
    },
    "filename": "./controller/Student.php",
    "groupTitle": "Student",
    "name": "PostStudentUpdate"
  }
] });
