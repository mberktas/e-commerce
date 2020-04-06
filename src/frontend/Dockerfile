FROM node:lts-alpine


# set working directory
WORKDIR /app

# add `/app/node_modules/.bin` to $PATH
ENV PATH /app/node_modules/.bin:$PATH
COPY /src/frontend .
# install and cache app dependencies
COPY /src/frontend/package.json /app/package.json
RUN npm install
# start app
CMD ["npm", "run", "serve"]
